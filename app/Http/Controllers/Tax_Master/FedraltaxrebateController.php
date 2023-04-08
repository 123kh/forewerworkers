<?php

namespace App\Http\Controllers\Tax_Master;

use App\Http\Controllers\Controller;
use App\Models\Tax_Master\Fedralrebate;
use Illuminate\Http\Request;

class FedraltaxrebateController extends Controller
{
public function index(){
    return view('Tax_Master/fedraltax_rebate');
}

public function create_provitialslab(Request $request){
    $fedr=new Fedralrebate;
    $fedr->value=$request->get('value');
    $fedr->save();
    return redirect(route('taxmaster.fedralrebate'));

}
}
