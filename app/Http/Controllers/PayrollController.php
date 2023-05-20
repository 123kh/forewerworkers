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
        ->when(!$request->year, function ($q) {
            return $q->whereYear('date','=', date('Y'));
        })  
        ->when($request->year, function ($q) use ($request) {
            return $q->whereYear('date','=', $request->year);
        })        
        ->when(!$request->month, function ($q) {
            return $q->whereMonth('date','=', date('m'));
        })  
        ->when($request->month, function ($q) use ($request) {
            return $q->whereMonth('date','=', $request->month);
        })
        ->CompletedJob() //CompletedJob() is a scope define in model in which condition is written
        ->orderby('id','desc')->groupby('employee_id')->paginate($paginate_length);
        //exit();
        return view('payroll.payroll',compact('locations','companies','employees','all_jobs'));
    }


    public function generate_payroll(Request $request){
      
        $job=AssignJobModel::find($request->job_id);
        $pdf=PDF::loadView('payroll.payroll-print',['job'=>$job]);
        return $pdf->download('Payroll-' . time() . '.pdf');
      // return view('payroll.payroll-print',compact('job'));

    }
}
