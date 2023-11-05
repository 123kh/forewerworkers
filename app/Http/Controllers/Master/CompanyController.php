<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Companyappend;
use App\Models\Master\Companyres;
use App\Models\Master\Category;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
        $cat=get_categories();
        $companies=Companyres::orderby('id','desc')->get();
        return view('Master.companyregistration',compact('cat','companies'));
    }
    
    public function create_company(Request $request){
    $validator = Validator::make(
        $request->all(),
        [
            'company_name' => ['required'],
            'transit_number' => ['required'],
            'institution_number' => ['required'],
            'account_number' => ['required'],
            'address' => ['required'],
            'zip' => ['required'],
            'contact_person' => ['required'],
            'email' => 'required|email|unique:companysregs,email',
            'contact_number' => ['required'],
            'straight_pay_hours' => ['required'],
            'overtime_hours1' => ['required'],
            'overtime_hours2' => ['required'],
        ],
        [
            'location.required' => 'Please enter location.',
            'company_name.required' => 'Please enter company name.',
            'transit_number.required' => 'Please enter transit number.',
            'institution_number.required' => 'Please enter institution number.',
            'account_number.required' => 'Please enter accountnumber.',
            'address.required' => 'Please enter address.',
            'zip.required' => 'Please enter zip.',
            'contact_person.required' => 'Please enter contact person.',
            'email.required' => 'Please enter email.',
            'email.unique' => 'The email address is already exist.',
            'contact_number.required' => 'Please enter contact number.',
            'straight_pay_hours.required' => 'Please enter straight pay hours.',
            'overtime_hours1.required' => 'Please enter overtime 1 hours.',
            'overtime_hours2.required' => 'Please enter overtime 2 hours.'
        ]);
        if ($validator->fails()) {
            $errors = '';
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                $errors .= $message . "<br>";
            }
            return back()->with(['error'=>$errors]);
        }

        // if($request->select_categories==null || (!isset($request->select_categories) && count($request->select_categories)<1)){
        //     return back()->with(['error'=>'Please add atleast one payout.']);
        // }
        
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
    
    //     for($i=0;$i<count($request->select_categories); $i++){
        $comappend=new Companyappend;
        $comappend->company_id=$insert_id;
       // $comappend->select_categories=$request->select_categories[$i];
        $comappend->straight_pay_hours=$request->straight_pay_hours;
        $comappend->overtime_hours1=$request->overtime_hours1;
        $comappend->overtime_hours2=$request->overtime_hours2;
       // $comappend->night_hours_pay=$request->night_hours_pay[$i];
        $comappend->save();
    // }
    return back()->with(['success'=>'data inserted successfully.']);

    }

    public function delete_company($id){
        Companyres::where('id',$id)->delete();
        Companyappend::where('company_id',$id)->delete();
        return back()->with(['success'=>'Record deleted successfully.']);

    }

    }

