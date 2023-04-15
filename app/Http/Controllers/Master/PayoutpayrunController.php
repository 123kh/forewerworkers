<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Payout;
use App\Models\Master\Payrun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PayoutpayrunController extends Controller
{
    public function index(){
        $payout=Payout::all();
        $payrun=Payrun::all();
        return view('Master/payout_payrun',['payout'=>$payout,'payrun'=>$payrun]);
    }

    public function create_payout(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'add_payout' => ['required']
            ],
            [
                'add_payout.required' => 'Please enter add payout.',
            ]);
            if ($validator->fails()) {
                $return = '';
                $messages = $validator->messages();
                foreach ($messages->all() as $message) {
                    $return .= $message . "<br>";
                }
                return back()->with(['error'=>$message]);
            }
        $payo=new Payout;
        $payo->add_payout=$request->get('add_payout');
        $payo->save();
        return back()->with(['success'=>'Data inserted successfully.']);
     }
  
     public function edit_payout($id)
     {
         $editpayo = Payout::find($id); 
         $payo = Payout::all();
         return view('Master.editpayrunpayout',['editpayo'=>$editpayo,'payo'=>$payo]);
     }
  
     public function update_payout(Request $request)
     {
        $validator = Validator::make(
            $request->all(),
            [
                'add_payout' => ['required']
            ],
            [
                'add_payout.required' => 'Please enter payout.',
            ]);
            if ($validator->fails()) {
                $return = '';
                $messages = $validator->messages();
                foreach ($messages->all() as $message) {
                    $return .= $message . "<br>";
                }
                return back()->with(['error'=>$message]);
            }
            Payout::where('id',$request->id)->update([ 
            'add_payout'=>$request->add_payout
        ]);
  
        return redirect()->route('master.payoutpayrun')->with(['success'=>'Data updated successfully.']);
       
     }
  
  
     public function destroy_payout($id)
     {
         $payo=Payout::where('id',$id)->delete();
         return back()->with(['delete'=>'Data deleted successfully.']);
    }
  
     //......category......//
     public function create_payrun(Request $request)
       {
        $validator = Validator::make(
            $request->all(),
            [
                'add_payrun' => ['required'],
                'no_of_days' => ['required']
            ],
            [
                'add_payrun.required' => 'Please enter payrun type.',
                'no_of_days.required' => 'Please enter no of days.',
            ]);
            if ($validator->fails()) {
                $errors = '';
                $messages = $validator->messages();
                foreach ($messages->all() as $message) {
                    $errors .= $message . "<br>";
                }
                return back()->with(['error'=>$errors]);
            }
  $cat=new Payrun;
  $cat->add_payrun=$request->get('add_payrun');
  $cat->no_of_days=$request->get('no_of_days');
  
  $cat->save();
  return back()->with(['success'=>'Data inserted successfully']);
}
  
     public function edit_payrun($id)
     {
         $editpayrun = Payrun::find($id); 
         $pyrun = Payrun::all();
         return view('Master.editpayrun',['editpayrun'=>$editpayrun,'pyrun'=>$pyrun]);
     }
  
     public function update_payrun(Request $request)
     {
        $validator = Validator::make(
            $request->all(),
            [
                'add_payrun' => ['required'],
                'no_of_days' => ['required']
            ],
            [
                'add_payrun.required' => 'Please enter payrun type.',
                'no_of_days.required' => 'Please enter no of days.',
            ]);
            if ($validator->fails()) {
                $errors = '';
                $messages = $validator->messages();
                foreach ($messages->all() as $message) {
                    $errors .= $message . "<br>";
                }
                return back()->with(['error'=>$errors]);
            }
        Payrun::where('id',$request->id)->update([
             'add_payrun'=>$request->add_payrun,
             'no_of_days'=>$request->no_of_days,
            
            ]);
  
            return redirect()->route('master.payoutpayrun')->with(['success'=>'Data updated successfully.']);
        }
  
     public function destroy_payrun($id)
     {
         $cat=Payrun::where('id',$id)->delete();
         return back()->with(['delete'=>'Data deleted successfully.']);
    }
}
