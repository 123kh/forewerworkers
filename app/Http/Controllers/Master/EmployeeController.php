<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Category;
use App\Models\Master\Location;
use App\Models\Master\Employee;
use App\Models\Master\Employeeappend;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $cat=Category:: select('categorys.add_category')
        ->get();
        $loc=Location:: select('locations.location')
        ->get();
        return view('Master/employee',['cat'=>$cat,'loc'=>$loc]);
    }

    public function create_employee(Request $request){

        $com=new Employee;
        $com->select_location=$request->get('select_location');
        $com->employee_id=$request->get('employee_id');
        $com->employee_name=$request->get('employee_name');
        $com->address=$request->get('address');
        $com->contact_number=$request->get('contact_number');
        $com->Email=$request->get('Email');
        $com->ID_proof=$request->get('ID_proof');
        $com->address_proof=$request->get('address_proof');
        $com->DOB=$request->get('DOB');
        $com->sin=$request->get('sin');
        $com->bcdl=$request->get('bcdl');
        $com->bank_name=$request->get('bank_name');
        $com->account_number=$request->get('account_number');
        $com->bank_details=$request->get('bank_details');

        $com->Job_Acceptreject=$request->get('Job_Acceptreject');
        $com->Show_Hide=$request->get('Show_Hide');
        $com->Only_Straight_hours=$request->get('Only_Straight_hours');   
        // 'Only_Straight_hours'=>'1',
  
       $com->save(); 
    
        $insert_id=$com->id;
    
        for($i=0;$i<count($request->select_categories); $i++){
        $comappend=new Employeeappend;
        $comappend->company_register_id=$insert_id;
      
    
        $comappend->select_categories=$request->select_categories[$i];
        $comappend->straight_pay_hours=$request->straight_pay_hours[$i];
        $comappend->overtime_hours1=$request->overtime_hours1[$i];
    
 
        $comappend->overtime_hours2=$request->overtime_hours2[$i];
        $comappend->night_hours_pay=$request->night_hours_pay[$i];
       
        $comappend->save();
    }
    // dd($request->all());
    
       
       // return redirect(route('promotor'));
       return redirect()->back();
    }


}
