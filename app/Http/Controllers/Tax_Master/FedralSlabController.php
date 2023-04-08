<?php

namespace App\Http\Controllers\Tax_Master;

use App\Http\Controllers\Controller;
use App\Models\Tax_Master\Fedraltaxslab;
use Illuminate\Http\Request;

class FedralSlabController extends Controller
{
  public function index(){
    $fed=Fedraltaxslab::all();
    return view('Tax_Master/fedraltax_slab',['fed'=>$fed]);
  }
  public function create_fedralslab(Request $request){
    $fed=new Fedraltaxslab;
    $fed->min_value=$request->get('min_value');
    $fed->max_value=$request->get('max_value');
    $fed->percentage_of_tax=$request->get('percentage_of_tax');
    $fed->save();
    return redirect(route('taxmaster.fedralslab'));
 }

 public function edit_fedralslab($id)
 {
     $editfd= Fedraltaxslab::find($id); 
     $fed = Fedraltaxslab::all();
     return view('Tax_Master/editfedralslab',['editfd'=>$editfd,'fed'=>$fed]);
 }

 public function update_fedralslab(Request $request)
 {
    Fedraltaxslab::where('id',$request->id)->update([ 
        'min_value'=>$request->min_value,
        'max_value'=>$request->max_value,
        'percentage_of_tax'=>$request->percentage_of_tax


    ]);

     return redirect()->route('taxmaster.fedralslab')->with(['success'=>true,'message'=>'Successfully Updated !']);
   
 }


 public function destroy_fedralslab($id)
 {
     $payo=Fedraltaxslab::where('id',$id)->delete();
     return redirect(route('taxmaster.fedralslab'));
 }

}
