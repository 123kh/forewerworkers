<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Master\Employee;
use Illuminate\Http\Request;
use DB;
use App\Models\AssignJobModel;

class DashboardController extends Controller
{
    public function index(Request $request){
//         
// 



        $paginate_length=10;
        if(isset($request->paginate_length) && $request->paginate_length!=null)
        $paginate_length=$request->paginate_length;
        
        $assign_Job=AssignJobModel::where('status','1')
        ->when($request->company_id, function ($q) use ($request) {
            return $q->where('company_id', $request->company_id);
        })
        ->when($request->employee_id, function ($q) use ($request) {
            return $q->where('employee_id', $request->employee_id);
        })
        ->when($request->company_id, function ($q) use ($request) {
            return $q->where('company_id', $request->company_id);
        })
        ->when($request->from_date, function ($q) use ($request) {
            return $q->whereDate('date','>=', $request->from_date);
        })
        ->when($request->to_date, function ($q) use ($request) {
            return $q->whereDate('date','<=', $request->to_date);
        })
    ->paginate($paginate_length);


        $accepted_Job=AssignJobModel::where('status','2')->when($request->company_id, function ($q) use ($request) {
            return $q->where('company_id', $request->company_id);
        })
    ->paginate($paginate_length);
        $rejected_Job=AssignJobModel::where('status','0')->when($request->company_id, function ($q) use ($request) {
            return $q->where('company_id', $request->company_id);
        })
    ->paginate($paginate_length);
        $companies=get_company();
        $employees=get_employee();
        $locations=get_location();
        return view('dashboard',compact('companies','employees','assign_Job','accepted_Job','rejected_Job','locations'));
    }
}
