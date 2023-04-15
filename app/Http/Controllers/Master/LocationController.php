<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Category;
use App\Models\Master\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class LocationController extends Controller
{
   public function index(){
      $loca=Location::all();
      $cat=Category::all();
    return view('Master.location',['loca'=>$loca,'cat'=>$cat]);
   }
//....location....//
   public function create(Request $request){
    $validator = Validator::make(
        $request->all(),
        [
            'location' => ['required']
        ],
        [
            'location.required' => 'Please enter location.',
        ]);
        if ($validator->fails()) {
            $errors = '';
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                $errors .= $message . "<br>";
            }
            return back()->with(['error'=>$errors]);
        }
        
      $loc=new Location;
      $loc->location=$request->get('location');
      $loc->save();
      return back()->with(['success'=>'Data inserted successfully.']);
   }

   public function edit_location($id)
   {
       $editlocation = Location::find($id); 
       $loc = Location::all();
       return view('Master.editlocation',['editlocation'=>$editlocation,'loc'=>$loc]);
   }

   public function update_location(Request $request)
   {
    $validator = Validator::make(
        $request->all(),
        [
            'location' => ['required']
        ],
        [
            'location.required' => 'Please enter location.',
        ]);
        if ($validator->fails()) {
            $return = '';
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                $return .= $message . "<br>";
            }
            return back()->with(['error'=>$message]);
        }
      Location::where('id',$request->id)->update([ 'location'=>$request->location]);

      return redirect()->route('Master.location')->with(['success'=>'Data updated successfully.']);
     
   }

   public function destroy_location($id)
   {
       $loc=Location::where('id',$id)->delete();
       return back()->with(['delete'=>'Data deleted successfully.']);
    }

   //......category......//
   public function createcategory(Request $request)
     {
        $validator = Validator::make(
            $request->all(),
            [
                'category' => ['required']
            ],
            [
                'category.required' => 'Please enter category.',
            ]);
            if ($validator->fails()) {
                $return = '';
                $messages = $validator->messages();
                foreach ($messages->all() as $message) {
                    $return .= $message . "<br>";
                }
                return back()->with(['error'=>$message]);
            }
        $cat=new Category;
        $cat->add_category=$request->get('category');
        $cat->save();
        return back()->with(['success'=>'Data inserted successfully.']);
    }

   public function edit_category($id)
   {
       $editcat = Category::find($id); 
       $cat = Category::all();
       return view('Master.editcategory',['editcat'=>$editcat,'cat'=>$cat]);
   }

   public function update_category(Request $request)
   {
    $validator = Validator::make(
        $request->all(),
        [
            'add_category' => ['required']
        ],
        [
            'add_category.required' => 'Please enter category.',
        ]);
        if ($validator->fails()) {
            $return = '';
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                $return .= $message . "<br>";
            }
            return back()->with(['error'=>$message]);
        }
      Category::where('id',$request->id)->update([ 'add_category'=>$request->add_category]);
      return redirect()->route('Master.location')->with(['success'=>'Data updated successfully.']);
     
   }

   public function destroycategory($id)
   {
       $cat=Category::where('id',$id)->delete();
       return back()->with(['delete'=>'Data deleted successfully.']);
   }
}
// $city= new Addcity;
// $city->city_name=$request->get('city');
// $city->save(); 
// return redirect(route('city'));