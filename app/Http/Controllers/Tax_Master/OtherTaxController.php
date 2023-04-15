<?php

namespace App\Http\Controllers\Tax_Master;

use App\Http\Controllers\Controller;
use App\Models\Tax_Master\Othertax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OtherTaxController extends Controller
{
   public function index(){
      $ottx=Othertax::first();
    
    return view('Tax_Master.othertax',['ottx'=>$ottx]);
   }
   public function update_othertax(Request $request){
      $validator = Validator::make(
         $request->all(),
       [
         'vacation_pay' => ['required'],
         'CPP_Employee_Contribution' => ['required'],
         'max_value_cpp' => ['required'],
         'cpp_employers_contribution' => ['required'],  
         'Max_Values_con' => ['required'],
         'EI_Employee_Contribution' => ['required'],
         'Max_Value_Ei' => ['required'],
         'ei_employers_contribution' => ['required'],
         'max_value_emprs' => ['required'],
       ],
       [
           'vacation_pay.required' => 'Please enter vacation pay.',
           'CPP_Employee_Contribution.required' => 'Please enter CPP employee contribution.',
           'max_value_cpp.required' => 'Please enter max value CPP.',
           'cpp_employers_contribution.required' => 'Please enterCPP employer contribution.',
           'Max_Values_con.required' => 'Please enter max value CPP.',
           'EI_Employee_Contribution.required' => 'Please enter employee contribution EI.',
           'Max_Value_Ei.required' => 'Please enter max value EI.',
           'ei_employers_contribution.required' => 'Please enter employer contribution EI.',
           'max_value_emprs.required' => 'Please enter max value EI.',
       ]);
       if ($validator->fails()) {
           $errors = '';
           $messages = $validator->messages();
           foreach ($messages->all() as $message) {
               $errors .= $message . "<br>";
           }
           return back()->with(['error'=>$errors]);
       }
      Othertax::find(1)
      ->update([
       'vacation_pay'=>$request->vacation_pay,
       'CPP_Employee_Contribution'=>$request->CPP_Employee_Contribution,
       'max_value_cpp'=>$request->max_value_cpp,
       'cpp_employers_contribution'=>$request->cpp_employers_contribution,
       'Max_Values_con'=>$request->Max_Values_con,
       'EI_Employee_Contribution'=>$request->EI_Employee_Contribution,
       'Max_Value_Ei'=>$request->Max_Value_Ei,
       'ei_employers_contribution'=>$request->ei_employers_contribution,
       'max_value_emprs'=>$request->max_value_emprs,
    ]);
    return back()->with(['success'=>'Data updated successfully.']);


   }
}
