<?php

namespace App\Http\Controllers\Tax_Master;

use App\Http\Controllers\Controller;
use App\Models\Tax_Master\Fedraltaxslab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class FedralSlabController extends Controller
{
  public function index(){
    $fed=Fedraltaxslab::all();
    return view('Tax_Master.fedraltax_slab',['fed'=>$fed]);
  }
  public function create_fedralslab(Request $request){
    $validator = Validator::make(
      $request->all(),
      [
          'min_value' => 'required|numeric',
          'max_value' => 'required|numeric',
          'percentage_of_tax' => 'required|numeric',
        
      ],
      [
          'min_value.required' => 'Please enter min value.',
          'min_value.numeric' => 'Please enter numeric value.',
          'max_value.required' => 'Please enter max value.',
          'percentage_of_tax.required' => 'Please enter percentage of tax.',
      ]);
      if ($validator->fails()) {
          $errors = '';
          $messages = $validator->messages();
          foreach ($messages->all() as $message) {
              $errors .= $message . "<br>";
          }
          return back()->with(['error'=>$errors]);
      }
    $fed=new Fedraltaxslab;
    $fed->min_value=$request->get('min_value');
    $fed->max_value=$request->get('max_value');
    $fed->percentage_of_tax=$request->get('percentage_of_tax');
    $fed->save();
    return back()->with(['success'=>'Data inserted successfully.']);
  }

 public function edit_fedralslab($id)
 {
     $editfd= Fedraltaxslab::find($id); 
     $fed = Fedraltaxslab::orderby('id','desc')->get();
     return view('Tax_Master.editfedralslab',['editfd'=>$editfd,'fed'=>$fed]);
 }

 public function update_fedralslab(Request $request)
 {
  $validator = Validator::make(
    $request->all(),
    [
        'min_value' => ['required'],
        'max_value' => ['required'],
        'percentage_of_tax' => ['required'],
      
    ],
    [
        'min_value.required' => 'Please enter min value.',
        'max_value.required' => 'Please enter max value.',
        'percentage_of_tax.required' => 'Please enter percentage of tax.',
    ]);
    if ($validator->fails()) {
        $errors = '';
        $messages = $validator->messages();
        foreach ($messages->all() as $message) {
            $errors .= $message . "<br>";
        }
        return back()->with(['error'=>$errors]);
    }
    Fedraltaxslab::where('id',$request->id)->update([ 
        'min_value'=>$request->min_value,
        'max_value'=>$request->max_value,
        'percentage_of_tax'=>$request->percentage_of_tax

    ]);

     return redirect()->route('taxmaster.fedralslab')->with(['success'=>'Data updated successfully.']);
   
 }


 public function destroy_fedralslab($id)
 {
     $payo=Fedraltaxslab::where('id',$id)->delete();
     return back()->with(['delete'=>'Data deleted successfully.']);
    }

}
