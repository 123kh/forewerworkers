<?php

namespace App\Http\Controllers;

use App\Models\AssignJobModel;
use App\Models\JobAssignedTimeMaster;
use App\Models\Master\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

use App\Models\Master\Category;
use App\Models\Master\Employeeappend;
use App\Models\Master\Companyappend;
use App\Models\Master\TimeMaster;

class AssignjobController extends Controller
{
    public function index(Request $request){
        $paginate_length=10;
        if(isset($request->paginate_length) && $request->paginate_length!=null)
        $paginate_length=$request->paginate_length;
        $locations=get_location();
        $companies=get_company();
        $employees=get_employee();
        $payout_category=Category::orderby('add_category','asc')->get();
        $all_jobs=AssignJobModel::orderby('id','desc')->paginate($paginate_length);
        $payrun=DB::table('payrun')->orderby('no_of_days','desc')->select('id','add_payrun')->get();

        return view('assign-job.create',compact('locations','companies','employees','all_jobs','payrun','payout_category'));
    }

    public function insert_assign_job(Request $request){
        // $check_employee_category=Employeeappend::where('select_categories',$request->payout_category_id)->exists();
        // $check_company_category=Companyappend::where('select_categories',$request->payout_category_id)->exists();
        // if(!$check_employee_category && !$check_company_category){
        //     return back()->with(['error'=>'The company and employee both must have same payout information for billling.']);
        //  }
            
        $validator = Validator::make(
            $request->all(),
            [
                'date' => 'required',
                'location_id' => 'required',
                'company_id' => 'required',
                'employee_id' => 'required',
                'job_title' => 'required',
                'job_description' => 'required',
                'job_start_date' => 'required',
                'job_start_time' => 'required',
                'job_end_date' => 'required',
                'expected_hour' => 'required',
                'payrun_id' => 'required',
                'payout_category_id' => 'required',
                
              
            ],
            [
                'date.required' => 'Please select date.',
                'location_id.required' => 'Please select location.',
                'company_id.required' => 'Please select company.',
                'employee_id.required' => 'Please select employee.',
                'job_title.required' => 'Please enter job title.',
                'job_description.required' => 'Please enter jon description.',
                'job_start_date.required' => 'Please select job start date.',
                'job_start_time.required' => 'Please select job start time.',
                'job_end_date.required' => 'Please select job end date.',
                'expected_hour.required' => 'Please enter expected hour.',
                'payrun_id.required' => 'Please select Payrun Type.',
                'payout_category_id.required' => 'Please select Payout Category.',

            ]);
            if ($validator->fails()) {
                $errors = '';
                $messages = $validator->messages();
                foreach ($messages->all() as $message) {
                    $errors .= $message . "<br>";
                }
                return back()->with(['error'=>$errors]);
            }
            $status='1';
            $Job_Acceptreject=Employee::find($request->employee_id)->Job_Acceptreject;
            $Job_Acceptreject=='0' ? $status='2' :$status='1';
            $insert=AssignJobModel::create([
                'date'=>$request->date,
                'location_id'=>$request->location_id,
                'company_id'=>$request->company_id,
                'employee_id'=>$request->employee_id,
                'job_title'=>$request->job_title,
                'job_description'=>$request->job_description,
                'job_start_date'=>$request->job_start_date,
                'job_start_time'=>$request->job_start_time,
                'job_end_date'=>$request->job_end_date,
                'expected_hour'=>$request->expected_hour,
                'status'=>$status,
                'payrun_id'=> $request->payrun_id,
                'payout_category_id'=> $request->payout_category_id,

            ]);
            $time_master=TimeMaster::first();
            JobAssignedTimeMaster::create([
               'day_start_time' => $time_master->day_start_time,
               'day_end_time' => $time_master->day_end_time,
               'night_start_time' => $time_master->night_start_time,
               'night_end_time' => $time_master->night_end_time,
               'job_id' => $insert->id, 
           ]);
            return back()->with(['success'=>'Job assigned successfully.']);

    }

    public function edit_assignjob(Request $request){
        $location=DB::table('locations')->orderby('location','asc')->select('id','location')->get();
        $company=DB::table('companysregs')->orderby('company_name','asc')->select('id','company_name')->get();
        $employee=DB::table('employees')->orderby('employee_name','asc')->select('id','employee_name','Email')->get();
        $edit_job=AssignJobModel::find($request->id);
        $all_jobs=AssignJobModel::orderby('id','desc')->paginate(10);
        $payrun=DB::table('payrun')->orderby('no_of_days','desc')->select('id','add_payrun')->get();

        return view('assign-job.edit',compact('location','company','employee','edit_job','all_jobs','payrun'));
    }
    public function update_assign_job(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'date' => 'required',
                'location_id' => 'required',
                'company_id' => 'required',
                'employee_id' => 'required',
                'job_title' => 'required',
                'job_description' => 'required',
                'job_start_date' => 'required',
                'job_start_time' => 'required',
                'job_end_date' => 'required',
                'expected_hour' => 'required',
                'payrun_id' => 'required',
              
            ],
            [
                'date.required' => 'Please select date.',
                'location_id.required' => 'Please select location.',
                'company_id.required' => 'Please select company.',
                'employee_id.required' => 'Please select employee.',
                'job_title.required' => 'Please enter job title.',
                'job_description.required' => 'Please enter job description.',
                'job_start_date.required' => 'Please select job start date.',
                'job_start_time.required' => 'Please select job start time.',
                'job_end_date.required' => 'Please select job end date.',
                'expected_hour.required' => 'Please enter expected hour.',
                'payrun_id.required' => 'Please select Payrun Type.'
            ]);
            if ($validator->fails()) {
                $errors = '';
                $messages = $validator->messages();
                foreach ($messages->all() as $message) {
                    $errors .= $message . "<br>";
                }
                return back()->with(['error'=>$errors]);
            }
            $status='1';
            $Job_Acceptreject=Employee::find($request->employee_id)->Job_Acceptreject;
            $Job_Acceptreject=='0' ? $status='2' :$status='1';
            AssignJobModel::where('id',$request->id)->update([
                'date'=>$request->date,
                'location_id'=>$request->location_id,
                'company_id'=>$request->company_id,
                'employee_id'=>$request->employee_id,
                'job_title'=>$request->job_title,
                'job_description'=>$request->job_description,
                'job_start_date'=>$request->job_start_date,
                'job_start_time'=>$request->job_start_time,
                'job_end_date'=>$request->job_end_date,
                'expected_hour'=>$request->expected_hour,
                'status'=>$status,
                'payrun_id'=> $request->payrun_id
            ]);
            return redirect()->route('assignjob')->with(['success'=>'Job updated successfully.']);
    }

    public function reassign_job(Request $request){
        $Job_Acceptreject=Employee::find($request->employee_id)->Job_Acceptreject;
        $Job_Acceptreject=='0' ? $status='2' :$status='1';
        AssignJobModel::where('id',$request->id)->update([
            'date'=>$request->date,
            'location_id'=>$request->location_id,
            'company_id'=>$request->company_id,
            'employee_id'=>$request->employee_id,
            'job_title'=>$request->job_title,
            'job_description'=>$request->job_description,
            'status'=>$status,
            
        ]);
        return redirect()->back()->with(['success'=>'Job Reassigned successfully.']);
    }

public function delete_assignjob(Request $request){
    AssignJobModel::find($request->id)->delete();
    return back()->with(['delete'=>'Data deleted successfully.']);

}

}
