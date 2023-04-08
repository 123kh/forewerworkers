<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Companyappend;
use App\Models\Master\Companyres;
use App\Models\Master\Category;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
        $cat=Category:: select('categorys.add_category')
        ->get();
        // $ca=Category::all();
        return view('Master\companyregistration',['cat'=>$cat]);
    }
    
    public function create_company(Request $request){

        $com=new Companyres;
        $com->company_name=$request->get('company_name');
        $com->transit_number=$request->get('transit_number');
        $com->institution_number=$request->get('institution_number');
        $com->account_number=$request->get('account_number');
        $com->address=$request->get('address');
        $com->zip=$request->get('zip');
        $com->contact_person=$request->get('contact_person');
        $com->email=$request->get('email');
        $com->contact_number=$request->get('contact_number');
  
       $com->save(); 
    
        $insert_id=$com->id;
    
        for($i=0;$i<count($request->select_categories); $i++){
        $comappend=new Companyappend;
        $comappend->company_register_id=$insert_id;
      
    
        $comappend->select_categories=$request->select_categories[$i];
        $comappend->straight_pay_hours=$request->straight_pay_hours[$i];
        $comappend->overtime_hours1=$request->overtime_hours1[$i];
    
 
        $comappend->overtime_hours2=$request->overtime_hours2[$i];
        $comappend->night_hours_pay=$request->night_hours_pay[$i];
       
        $comappend->save();
    }
    
    
       
       // return redirect(route('promotor'));
       return redirect()->back();
    }

    }

