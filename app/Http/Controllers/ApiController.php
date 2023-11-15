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
use Hash, DB;
use Illuminate\Support\Carbon;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',

        ]);
        if ($validators->fails()) {
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        }
        $user = Employee::whereEmail($request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json($user);
        } else {
            $validator['status'] = false;
            $validator['messages'] = 'Please check username and password.';
            return response()->json($validator);
        }
    }

    public function forgot_password_otp(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'contact_number' => 'required',

        ]);
        if ($validators->fails()) {
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        }
        $user = Employee::where('contact_number', $request->contact_number)->first();
        if ($user) {
            //$otp = rand('1000', '9999');
            $otp = '1234';
            // $msg = 'Your OTP verification code for password set or change request is ' . $otp . '. Amruta Hatcheries & Foods.';
            // $msg = urlencode($msg);
            // $to = $request->contact_number;
            // $data1 = "uname=habitm1&pwd=habitm1&senderid=AMFOOD&to=" . $to . "&msg=" . $msg . "&route=T&peid=1001880907683289176&tempid=1007815211240576240";
            // $ch = curl_init('http://bulksms.webmediaindia.com/sendsms?');
            // curl_setopt($ch, CURLOPT_POST, true);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // $result = curl_exec($ch);
            // curl_close($ch);
            return response()->json($otp);
        } else {
            $validator['status'] = false;
            $validator['messages'] = 'User not present.';
            return response()->json($validator);
        }
    }

    public function update_password(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'contact_number' => 'required',
            'password' => 'required',

        ]);
        if ($validators->fails()) {
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        }
        $user = Employee::where('contact_number', $request->contact_number)->first();
        if ($user) {
            $update = Employee::where('contact_number', $request->contact_number)->update([
                'password' => Hash::make($request->password),

            ]);
            return response()->json(['messages' => 'Password updated successfully.']);
        } else {
            return response()->json(['messages' => 'User not present.']);
        }
    }

    public function update_password_by_id(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'id' => 'required',
            'password' => 'required',

        ]);
        if ($validators->fails()) {
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        }
        $user = Employee::where('id', $request->id)->first();
        if ($user) {
            $update = Employee::where('id', $request->id)->update([
                'password' => Hash::make($request->password),

            ]);
            return response()->json(['messages' => 'Password updated successfully.']);
        } else {
            return response()->json(['messages' => 'User not present.']);
        }
    }

    public function get_user_details(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'employee_id' => 'required'
        ]);
        if ($validators->fails()) {
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        }
        $user = Employee::find($request->employee_id);
        if ($user) {
            return response()->json($user);
        } else {
            $validator['status'] = false;
            $validator['messages'] = 'User not exist.';
            return response()->json($validator);
        }
    }

    public function get_user_jobs(Request $request)
    {
        $today = Carbon::now();
        $validators = Validator::make($request->all(), [
            'employee_id' => 'required'
        ]);
        if ($validators->fails()) {
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        }
        $previous_jobs = AssignJobModel::whereDate('date', '<', $today->format('Y-m-d'))
            ->where('employee_id', $request->employee_id)->select('employee_id', 'date')->groupBy('date')->get();
        $upcoming_jobs = AssignJobModel::whereDate('date', '>', $today->format('Y-m-d'))
            ->where('employee_id', $request->employee_id)->select('employee_id', 'date')->groupBy('date')->get();
        $current_jobs = AssignJobModel::whereBetween('date', [$today->format('Y-m-d'), $today->addDays(6)->format('Y-m-d')])
            ->where('employee_id', $request->employee_id)->select('employee_id', 'date')->groupBy('date')->get();
        return response()->json([
            'previous_jobs' => $previous_jobs,
            'current_jobs' => $current_jobs,
            'upcoming_jobs' => $upcoming_jobs
        ]);
    }

    public function get_job_by_date(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'employee_id' => 'required',
            'date' => 'required'
        ]);
        if ($validators->fails()) {
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        }
        $job = AssignJobModel::whereDate('date', date('Y-m-d', strtotime($request->date)))
            ->where('employee_id', $request->employee_id)->get();
        if ($job->isEmpty()) {
            $validator['status'] = false;
            $validator['messages'] = 'No job present for this date.';
            return response()->json($validator);
        } else {
            return response()->json($job);
        }
    }

    public function upload_timesheet(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'timesheet' => 'required',
            'job_id' => 'required',
        ]);
        if ($validators->fails()) {
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        }
        if (AssignJobModel::find($request->job_id)) {
            if ($request->timesheet != 'null') {
                $extension = explode('/', mime_content_type($request->timesheet))[1];
                $data = base64_decode(substr($request->timesheet, strpos($request->timesheet, ',') + 1));
                $timesheet = 'timesheet-' . rand(000, 999) . time() . '.' . $extension;
                file_put_contents(public_path('uploads/employee_timesheet/') . '/' . $timesheet, $data);
            }
            AssignJobModel::find($request->job_id)->update([
                'timesheet' => 'uploads/employee_timesheet/' . $timesheet
            ]);
            $validator['status'] = true;
            $validator['messages'] = 'Timesheet uploaded successfully';
            return response()->json($validator);
        } else {
            $validator['status'] = false;
            $validator['messages'] = 'Job not found';
            return response()->json($validator);
        }
    }

    public function accept_reject_job(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'job_id' => 'required',
            'status' => 'required',
        ]);
        if ($validators->fails()) {
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        }
        if (AssignJobModel::find($request->job_id)) {
            AssignJobModel::find($request->job_id)->update(['status' => $request->status]);
            $validator['status'] = true;
            $validator['messages'] = 'Job status changed successfully';
            return response()->json($validator);
        } else {
            $validator['status'] = false;
            $validator['messages'] = 'Job not found';
            return response()->json($validator);
        }
    }

    public function check_in_job(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'employee_id' => 'required',
            'job_id' => 'required',
            'check_in_time' => 'required',
        ]);
        if ($validators->fails()) {
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        }
        if (AssignJobModel::find($request->job_id)) {
            AssignJobModel::find($request->job_id)->update(['check_in_time' => date('Y-m-d') . ' ' . $request->check_in_time]);
            $validator['status'] = true;
            $validator['messages'] = 'Check in successfully.';
            return response()->json($validator);
        } else {
            $validator['status'] = false;
            $validator['messages'] = 'Job does not present.';
            return response()->json($validator);
        }
    }

    public function check_out_job(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'employee_id' => 'required',
            'job_id' => 'required',
            'check_out_time' => 'required',
        ]);
        if ($validators->fails()) {
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        }
        if (AssignJobModel::find($request->job_id)) {
            AssignJobModel::find($request->job_id)->update([
                'check_out_time' => date('Y-m-d') . ' ' . $request->check_out_time,
                'status' => '3'
            ]);
            $validator['status'] = true;
            $validator['messages'] = 'Check out successfully.';
            return response()->json($validator);
        } else {
            $validator['status'] = false;
            $validator['messages'] = 'Job does not present.';
            return response()->json($validator);
        }
    }

    public function get_company_list(Request $request){
        $validators = Validator::make($request->all(), [
            'employee_id' => 'required',
        ]);
        if ($validators->fails()) {
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        }
       
        $company=AssignJobModel::where([
            'employee_id' => $request->employee_id,
            ])
            ->join('companysregs','companysregs.id','=','assign_job_models.company_id')
            ->select('companysregs.id','companysregs.company_name as name')
            ->groupby('companysregs.id')
            ->get();
            if ($company->isNotEmpty()) {
                return response()->json($company);
            } else {
            $validator['status'] = false;
            $validator['messages'] = 'No company found for this user.';
            return response()->json($validator);
        }
    }
   
    public function get_payroll(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'employee_id' => 'required',
            'company_id' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
        ]);
        if ($validators->fails()) {
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        }
        $from_date = Carbon::parse($request->from_date)->startOfDay();
        $to_date = Carbon::parse($request->to_date)->endOfDay();
        $jobs = AssignJobModel::where([
            'employee_id' => $request->employee_id,
            'company_id' => $request->company_id,
        ])->whereBetween('date', [$from_date, $to_date])->get();
        $jobIds = $jobs->pluck('id');

        if ($jobs->isNotEmpty()) {
            $new_instance = new AssignJobModel();
            $data = $new_instance->getPayOutByIDAttribute($jobIds);
            return response()->json($data);
        } else {
            $validator['status'] = false;
            $validator['messages'] = 'Job does not present.';
            return response()->json($validator);
        }
    }

    public function get_company_wise_data(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'employee_id' => 'required',
        ]);
        if ($validators->fails()) {
            $validator['status'] = false;
            $validator['messages'] = $validators->errors()->all();
            return response()->json($validator);
        }

        $jobs = AssignJobModel::where([
            'employee_id' => $request->employee_id,
        ])->select('company_id')->groupby('company_id')->get();

        $data = [];
        foreach ($jobs as $job) {
            $companyJobs = [
                'company_name' => $job->companyname,
                'company_total_hr' => 0, // Initialize total hours
                'company_total_pay' => 0, // Initialize total pay
                'jobs' => [],
            ];
            $job_detail = AssignJobModel::where([
                'employee_id' => $request->employee_id,
                'company_id' => $job->company_id,
            ])->select('id','date','company_id','employee_id','job_title','status','check_in_time','check_out_time')->get();
        
            foreach ($job_detail as $jobDetail) {
                $companyJobs['jobs'][] = [
                    'job_name' => $jobDetail->job_title,
                    'total_hr' => floatval($jobDetail->working_hours),
                    'total_pay' => $jobDetail->approx_pay,
                    'job_date' => $jobDetail->date,
                    'day' => date('l',strtotime($jobDetail->date)),
                    'hr_rate' => $jobDetail->approx_pay/floatval($jobDetail->working_hours),
                    // Add more job details as needed
                ];
                $companyJobs['company_total_hr'] += floatval($jobDetail->working_hours);
                $companyJobs['company_total_pay'] += floatval($jobDetail->approx_pay);
            }
            $data[] = $companyJobs;
        }

        if ($jobs->isNotEmpty()) {
            return response()->json($data);
        } else {
            $validator['status'] = false;
            $validator['messages'] = 'Job does not present.';
            return response()->json($validator);
        }
    }

}
