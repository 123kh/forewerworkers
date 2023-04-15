<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Category;
use App\Models\Master\Location;
use App\Models\Master\Employee;
use App\Models\Master\Employeeappend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index(){
        $cat=get_categories();

        $loc=get_location();
        return view('Master.employee',['cat'=>$cat,'loc'=>$loc]);
    }

    public function create_employee(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'select_location' => ['required'],
                'employee_id' => 'required|unique:employees',
                'employee_name' => ['required'],
                'address' => ['required'],
                'contact_number' => ['required'],
                'Email' => ['required'],
                'ID_proof' => ['required'],
                'address_proof' => ['required'],
                'DOB' => ['required'],
                'sin' => ['required'],
            ],
            [
                'select_location.required' => 'Please enter location.',
                'employee_id.required' => 'Please enter employee id.',
                'employee_name.required' => 'Please enter employee name.',
                'address.required' => 'Please enter address.',
                'contact_number.required' => 'Please enter contact number.',
                'Email.required' => 'Please enter email.',
                'ID_proof.required' => 'Please enter ID proof.',
                'address_proof.required' => 'Please enter address proof.',
                'DOB.required' => 'Please enter DOB.',
                'sin.required' => 'Please enter sin.'
            ]);
            if ($validator->fails()) {
                $errors = '';
                $messages = $validator->messages();
                foreach ($messages->all() as $message) {
                    $errors .= $message . "<br>";
                }
                return back()->with(['error'=>$errors]);
            }
            if($request->select_categories==null || (!isset($request->select_categories) && count($request->select_categories)<1)){
                return back()->with(['error'=>'Please add atleast one payout.']);
            }
            $destination=public_path().'/uploads/employee/';
           
            if ($request->hasFile('address_proof')) {
                $image = $request->file('address_proof');
                $address_proof = 'Address' . time() . '.' . $image->getClientOriginalExtension();
                $image->move($destination, $address_proof);
            } 
            if ($request->hasFile('ID_proof')) {
                $image2 = $request->file('ID_proof');
                $id_proof = 'ID' . time() . '.' . $image2->getClientOriginalExtension();
                $image2->move($destination, $id_proof);
            } 
             
            
        $com=new Employee;
        $com->select_location=$request->get('select_location');
        $com->employee_id=$request->get('employee_id');
        $com->employee_name=$request->get('employee_name');
        $com->address=$request->get('address');
        $com->contact_number=$request->get('contact_number');
        $com->Email=$request->get('Email');
        $com->ID_proof='uploads/employee/'.$id_proof;;
        $com->address_proof='uploads/employee/'.$address_proof;
        $com->DOB=$request->get('DOB');
        $com->sin=$request->get('sin');
        $com->bcdl=$request->get('bcdl');
        $com->bank_name=$request->get('bank_name');
        $com->account_number=$request->get('account_number');
        $com->bank_details=$request->get('bank_details');

        $com->Job_Acceptreject=$request->get('Job_Acceptreject') ? '1' : '0';
        $com->Show_Hide=$request->get('Show_Hide') ? '1' : '0';
        $com->Only_Straight_hours=$request->get('Only_Straight_hours') ? '1' : '0';   
        // 'Only_Straight_hours'=>'1',
       $com->save(); 
        $insert_id=$com->id;
        for($i=0;$i<count($request->select_categories); $i++){
        $comappend=new Employeeappend;
        $comappend->employee_id=$insert_id;
        $comappend->select_categories=$request->select_categories[$i];
        $comappend->straight_pay_hours=$request->straight_pay_hours[$i];
        $comappend->overtime_hours1=$request->overtime_hours1[$i];
        $comappend->overtime_hours2=$request->overtime_hours2[$i];
        $comappend->night_hours_pay=$request->night_hours_pay[$i];
        $comappend->save();
    }
   
    return back()->with(['success'=>'Data inserted successfully.']);
}


}
