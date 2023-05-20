<?php

namespace App\Http\Controllers;

use App\Models\AssignJobModel;
use Illuminate\Http\Request;
use App\Models\Master\Employee;
use App\Models\Master\Companyappend;
use App\Models\Master\Companyres;
use Illuminate\Support\Facades\Validator;
use App\Models\Master\Employeeappend;
use GrahamCampbell\ResultType\Success;
use Hash,DB;
use Illuminate\Support\Carbon;

class ApiController extends Controller
{
    public function login(Request $request){
        $validators = Validator::make($request->all(), [
            'email' => 'required',
			'password' => 'required',
            
        ]);
        if ($validators->fails()){
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        }
        $user=Employee::whereEmail($request->email)->first();
        if($user && Hash::check($request->password,$user->password)){
            return response()->json($user);
        }else{
            $validator['status'] = false;
            $validator['messages'] = 'Please check username and password.';
            return response()->json($validator);
        }
    }

    public function get_user_details(Request $request){
        $validators = Validator::make($request->all(), [
            'employee_id' => 'required'
        ]);
        if ($validators->fails()){
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        }
        $user=Employee::find($request->employee_id);
        if($user){
            return response()->json($user);
        }else{
            $validator['status'] = false;
            $validator['messages'] = 'User not exist.';
            return response()->json($validator);
        }
    }

    public function get_user_jobs(Request $request){
        $today=Carbon::now();
        $validators = Validator::make($request->all(), [
            'employee_id' => 'required'
        ]);
        if ($validators->fails()){
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        } 
        $previous_jobs=AssignJobModel::whereDate('date','<',$today->format('Y-m-d'))
        ->where('employee_id',$request->employee_id)->select('employee_id','date')->groupBy('date')->get();
        $upcoming_jobs=AssignJobModel::whereDate('date','>',$today->format('Y-m-d'))
        ->where('employee_id',$request->employee_id)->select('employee_id','date')->groupBy('date')->get();
        $current_jobs=AssignJobModel::whereBetween('date',[ $today->format('Y-m-d'),$today->addDays(6)->format('Y-m-d')])
        ->where('employee_id',$request->employee_id)->select('employee_id','date')->groupBy('date')->get(); 
            return response()->json([
                'previous_jobs'=>$previous_jobs,
                'current_jobs'=>$current_jobs,
                'upcoming_jobs'=>$upcoming_jobs
            ]);
    }

    public function get_job_by_date(Request $request){
        $validators = Validator::make($request->all(), [
            'employee_id' => 'required',
            'date' => 'required'
        ]);
        if ($validators->fails()){
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        } 
        $job=AssignJobModel::whereDate('date',date('Y-m-d',strtotime($request->date)))
        ->where('employee_id',$request->employee_id)->get();
        if( $job->isEmpty()){
            $validator['status'] = false;
            $validator['messages']='No job present for this date.';
            return response()->json($validator);
        }else{
            return response()->json($job);
        }
    }

    public function upload_timesheet(Request $request) {
        $validators = Validator::make($request->all(), [
            'timesheet' => 'required',
            'job_id' => 'required',
        ]);
        if ($validators->fails()){
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        } 
        if(AssignJobModel::find($request->job_id)){
            if ($request->timesheet != 'null') {
            $extension= explode('/', mime_content_type($request->timesheet))[1];
        $data = base64_decode(substr($request->timesheet, strpos($request->timesheet, ',') + 1));
        $timesheet='timesheet-'.rand(000,999). time() . '.' .$extension;
        file_put_contents(public_path('uploads/employee_timesheet/') . '/' . $timesheet, $data);
        }
            AssignJobModel::find($request->job_id)->update([
                'timesheet'=>'uploads/employee_timesheet/'.$timesheet
            ]);
            $validator['status'] = true;
            $validator['messages'] = 'Timesheet uploaded successfully';
            return response()->json($validator);
        }else{
            $validator['status'] = false;
            $validator['messages'] = 'Job not found';
            return response()->json($validator);
        }
    }

    public function accept_reject_job(Request $request){
        $validators = Validator::make($request->all(), [
            'job_id' => 'required',
            'status' => 'required',
        ]);
        if ($validators->fails()){
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        } 
        if(AssignJobModel::find($request->job_id)){
            AssignJobModel::find($request->job_id)->update(['status'=>$request->status]);
            $validator['status'] = true;
            $validator['messages'] = 'Job status changed successfully';
            return response()->json($validator);
        }else{
            $validator['status'] = false;
            $validator['messages'] = 'Job not found';
            return response()->json($validator);
        }
    }

    public function check_in_job(Request $request){
        $validators = Validator::make($request->all(), [
            'employee_id' => 'required',
            'job_id' => 'required',
            'check_in_time' => 'required',
        ]);
        if ($validators->fails()){
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        } 
        if(AssignJobModel::find($request->job_id)){
            AssignJobModel::find($request->job_id)->update(['check_in_time'=>date('Y-m-d').' '.$request->check_in_time]);
            $validator['status'] = true;
            $validator['messages']='Check in successfully.';
            return response()->json($validator);
        }else{
            $validator['status'] = false;
            $validator['messages']='Job does not present.';
            return response()->json($validator);
        }
    }

    public function check_out_job(Request $request){
        $validators = Validator::make($request->all(), [
            'employee_id' => 'required',
            'job_id' => 'required',
            'check_out_time' => 'required',
        ]);
        if ($validators->fails()){
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        } 
        if(AssignJobModel::find($request->job_id)){  
            AssignJobModel::find($request->job_id)->update([
                'check_out_time'=>date('Y-m-d').' '.$request->check_out_time,
                'status'=>'3'
            ]);
            $validator['status'] = true;
            $validator['messages']='Check out successfully.';
            return response()->json($validator);
        }else{
            $validator['status'] = false;
            $validator['messages']='Job does not present.';
            return response()->json($validator);
        }
    }

    
}
