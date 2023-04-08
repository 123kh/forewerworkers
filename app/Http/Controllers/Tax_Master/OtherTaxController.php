<?php

namespace App\Http\Controllers\Tax_Master;

use App\Http\Controllers\Controller;
use App\Models\Tax_Master\Othertax;
use Illuminate\Http\Request;

class OtherTaxController extends Controller
{
   public function index(){
      $ottx=Othertax::first();
    
    return view('Tax_Master/othertax',['ottx'=>$ottx]);
   }
   public function update_othertax(Request $request){
      Othertax::where('id','24')//24 id ke recorde hi update hoge
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
   //  Othertax::where('id','1')
   //   ->update([
   //    'value'=>$request->vacation,
   // ]);

   // Othertax::where('id','1')
   //   ->update([
   //    'value'=>$request->vacation,
   // ]);
         // $othertx->vacation_pay=$request->get('vacation_pay'); 
      // $othertx->CPP_Employee_Contribution=$request->get('CPP_Employee_Contribution'); 
      // $othertx->max_value_cpp=$request->get('max_value_cpp'); 
      // $othertx->cpp_employers_contribution=$request->get('cpp_employers_contribution'); 
      // $othertx->Max_Values_con=$request->get('Max_Values_con'); 
      // $othertx->EI_Employee_Contribution=$request->get('EI_Employee_Contribution'); 
      // $othertx->Max_Value_Ei=$request->get('Max_Value_Ei'); 
      // $othertx->ei_employers_contribution=$request->get('ei_employers_contribution'); 
      // $othertx->max_value_emprs=$request->get('max_value_emprs');
      return redirect(route('taxmaster.othertax')); 

   }
}
