<?php

namespace App\Http\Controllers\Tax_Master;

use App\Http\Controllers\Controller;
use App\Models\Tax_Master\Protaxslab;
use Illuminate\Http\Request;

class ProvitialtaxSlabController extends Controller
{
    public function index(){
        $protax=Protaxslab::all();
        return view('Tax_Master/provitialtaxslab',['protax'=>$protax]);
  
    }

    public function create_provitialslab(Request $request){
        $fed=new Protaxslab;
        $fed->min_values=$request->get('min_values');
        $fed->max_values=$request->get('max_values');
        $fed->percentage_of_taxs=$request->get('percentage_of_taxs');
        $fed->save();
        return redirect(route('taxmaster.provitialslab'));
     }
    
     public function edit_provitialslab($id)
     {
         $editpd= Protaxslab::find($id); 
         $pd = Protaxslab::all();
         return view('Tax_Master/editprovintialslab',['editpd'=>$editpd,'pd'=>$pd]);
     }
    
     public function update_provitialslab(Request $request)
     {
        Protaxslab::where('id',$request->id)->update([ 
            'min_values'=>$request->min_values,
            'max_values'=>$request->max_values,
            'percentage_of_taxs'=>$request->percentage_of_taxs
    
    
        ]);
    
         return redirect()->route('taxmaster.provitialslab')->with(['success'=>true,'message'=>'Successfully Updated !']);
       
     }
    
    
     public function destroy_provitialslab($id)
     {
         $payo=Protaxslab::where('id',$id)->delete();
         return redirect(route('taxmaster.provitialslab'));
     }
      
}
