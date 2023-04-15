<?php

namespace App\Http\Controllers\Tax_Master;

use App\Http\Controllers\Controller;
use App\Models\Tax_Master\Protaxslab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProvitialtaxSlabController extends Controller
{
    public function index(){
        $protax=Protaxslab::all();
        return view('Tax_Master.provitialtaxslab',['protax'=>$protax]);
  
    }

    public function create_provitialslab(Request $request){
    $validator = Validator::make(
        $request->all(),
      [
          'min_values' => ['required'],
          'max_values' => ['required'],
          'percentage_of_taxs' => ['required'],
        
      ],
      [
          'min_values.required' => 'Please enter min value.',
          'max_values.required' => 'Please enter max value.',
          'percentage_of_taxs.required' => 'Please enter percentage of tax.',
      ]);
      if ($validator->fails()) {
          $errors = '';
          $messages = $validator->messages();
          foreach ($messages->all() as $message) {
              $errors .= $message . "<br>";
          }
          return back()->with(['error'=>$errors]);
      }
        $fed=new Protaxslab;
        $fed->min_values=$request->get('min_values');
        $fed->max_values=$request->get('max_values');
        $fed->percentage_of_taxs=$request->get('percentage_of_taxs');
        $fed->save();
        return back()->with(['success'=>'Data inserted successfully.']);
    }
    
     public function edit_provitialslab($id)
     {
         $editpd= Protaxslab::find($id); 
         $pd = Protaxslab::all();
         return view('Tax_Master.editprovintialslab',['editpd'=>$editpd,'pd'=>$pd]);
     }
    
     public function update_provitialslab(Request $request)
     {
        $validator = Validator::make(
            $request->all(),
          [
              'min_values' => ['required'],
              'max_values' => ['required'],
              'percentage_of_taxs' => ['required'],
            
          ],
          [
              'min_values.required' => 'Please enter min value.',
              'max_values.required' => 'Please enter max value.',
              'percentage_of_taxs.required' => 'Please enter percentage of tax.',
          ]);
          if ($validator->fails()) {
              $errors = '';
              $messages = $validator->messages();
              foreach ($messages->all() as $message) {
                  $errors .= $message . "<br>";
              }
              return back()->with(['error'=>$errors]);
          }
        Protaxslab::where('id',$request->id)->update([ 
            'min_values'=>$request->min_values,
            'max_values'=>$request->max_values,
            'percentage_of_taxs'=>$request->percentage_of_taxs
    
    
        ]);
    
         return redirect()->route('taxmaster.provitialslab')->with(['success'=>'Data updated successfully.']);
       
     }
    
    
     public function destroy_provitialslab($id)
     {
         $payo=Protaxslab::where('id',$id)->delete();
         return back()->with(['delete'=>'Data deleted successfully.']);
        }
      
}
