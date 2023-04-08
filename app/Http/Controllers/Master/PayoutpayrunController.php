<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Payout;
use App\Models\Master\Payrun;
use Illuminate\Http\Request;

class PayoutpayrunController extends Controller
{
    public function index(){
        $payout=Payout::all();
        $payrun=Payrun::all();
        return view('Master/payout_payrun',['payout'=>$payout,'payrun'=>$payrun]);
    }

    public function create_payout(Request $request){
        $payo=new Payout;
        $payo->add_payout=$request->get('add_payout');
        $payo->save();
        return redirect(route('master.payoutpayrun'));
     }
  
     public function edit_payout($id)
     {
         $editpayo = Payout::find($id); 
         $payo = Payout::all();
         return view('Master.editpayrunpayout',['editpayo'=>$editpayo,'payo'=>$payo]);
     }
  
     public function update_payout(Request $request)
     {
        Payout::where('id',$request->id)->update([ 
            'add_payout'=>$request->add_payout
        ]);
  
         return redirect()->route('master.payoutpayrun')->with(['success'=>true,'message'=>'Successfully Updated !']);
       
     }
  
  
     public function destroy_payout($id)
     {
         $payo=Payout::where('id',$id)->delete();
         return redirect(route('master.payoutpayrun'));
     }
  
     //......category......//
     public function create_payrun(Request $request)
       {
  $cat=new Payrun;
  $cat->add_payrun=$request->get('add_payrun');
  $cat->no_of_days=$request->get('no_of_days');
  
  $cat->save();
  return redirect(route('master.payoutpayrun'));
     }
  
     public function edit_payrun($id)
     {
         $editpayrun = Payrun::find($id); 
         $pyrun = Payrun::all();
         return view('Master.editpayrun',['editpayrun'=>$editpayrun,'pyrun'=>$pyrun]);
     }
  
     public function update_payrun(Request $request)
     {
        Payrun::where('id',$request->id)->update([
             'add_payrun'=>$request->add_payrun,
             'no_of_days'=>$request->no_of_days,
            
            ]);
  
         return redirect()->route('master.payoutpayrun')->with(['success'=>true,'message'=>'Successfully Updated !']);
       
     }
  
     public function destroy_payrun($id)
     {
         $cat=Payrun::where('id',$id)->delete();
         return redirect(route('master.payoutpayrun'));
     }
}
