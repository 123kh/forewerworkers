<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignJobModel;
use PDF;    


class PayrollController extends Controller
{
    public function index(Request $request){
        $paginate_length=10;
        if(isset($request->paginate_length) && $request->paginate_length!=null)
        $paginate_length=$request->paginate_length;
        $locations=get_location();
        $companies=get_company();
        $employees=get_employee();
        
        $all_jobs=AssignJobModel::
        when($request->company_id, function ($q) use ($request) {
            return $q->where('company_id', $request->company_id);
        })
        ->when($request->employee_id, function ($q) use ($request) {
            return $q->where('employee_id', $request->employee_id);
        })
        ->when($request->location_id, function ($q) use ($request) {
            return $q->where('location_id', $request->location_id);
        })
        ->when($request->from_date, function ($q) use ($request) {
            return $q->whereDate('date','>=', $request->from_date);
        })
        ->when($request->to_date, function ($q) use ($request) {
            return $q->whereDate('date','<=', $request->to_date);
        })
        ->orderby('id','desc')->paginate($paginate_length);
        return view('payroll.payroll',compact('locations','companies','employees','all_jobs'));
    }


    public function generate_payroll(Request $request){
        $assignjob=AssignJobModel::find($request->id);
        $pdf=PDF::loadView('payroll.payroll-print');
        return $pdf->download('Payroll-' . date('dmmyhis') . '.pdf');


        //return view('payroll.payroll-print',compact('assignjob'));
    }
}
