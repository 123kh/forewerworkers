<?php

namespace App\Http\Controllers\Tax_Master;

use App\Http\Controllers\Controller;
use App\Models\Tax_Master\Fedralrebate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class FedraltaxrebateController extends Controller
{
public function index(){
    $data=Fedralrebate::find(1);
    return view('Tax_Master.fedraltax_rebate',compact('data'));
}

public function create_fedraltaxrebate(Request $request){
    $validator = Validator::make(
        $request->all(),
      [
          'value' => ['required'],
      ],
      [
          'value.required' => 'Please enter min value.',
      ]);
      if ($validator->fails()) {
          $errors = '';
          $messages = $validator->messages();
          foreach ($messages->all() as $message) {
              $errors .= $message . "<br>";
          }
          return back()->with(['error'=>$errors]);
      }
    $fedr=Fedralrebate::find(1);
    $fedr->value=$request->get('value');
    $fedr->save();
    return back()->with(['success'=>'Data updated successfully.']);

}
}
