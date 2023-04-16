<?php

namespace App\Http\Controllers;

use App\Models\AssignJobModel;
use App\Models\Master\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
class AssignjobController extends Controller
{
    public function index(Request $request){
        $paginate_length=10;
        if(isset($request->paginate_length) && $request->paginate_length!=null)
        $paginate_length=$request->paginate_length;
        $locations=get_location();
        $companies=get_company();
        $employees=get_employee();
        $all_jobs=AssignJobModel::orderby('id','desc')->paginate($paginate_length);
        $payrun=DB::table('payrun')->orderby('no_of_days','desc')->select('id','add_payrun')->get();

        return view('assign-job.create',compact('locations','companies','employees','all_jobs','payrun'));
    }

    public function insert_assign_job(Request $request){
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
                'job_description.required' => 'Please enter jon description.',
                'job_start_date.required' => 'Please select job start date.',
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
            AssignJobModel::create([
                'date'=>$request->date,
                'location_id'=>$request->location_id,
                'company_id'=>$request->company_id,
                'employee_id'=>$request->employee_id,
                'job_title'=>$request->job_title,
                'job_description'=>$request->job_description,
                'job_start_date'=>$request->job_start_date,
                'job_end_date'=>$request->job_end_date,
                'expected_hour'=>$request->expected_hour,
                'status'=>$status,
                'payrun_id'=> $request->payrun_id

            ]);
            return back()->with(['success'=>'Date inserted successfully.']);

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
                'job_description.required' => 'Please enter jon description.',
                'job_start_date.required' => 'Please select job start date.',
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
                'job_end_date'=>$request->job_end_date,
                'expected_hour'=>$request->expected_hour,
                'status'=>$status,
                'payrun_id'=> $request->payrun_id
            ]);
            return redirect()->route('assignjob')->with(['success'=>'Date updated successfully.']);
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
