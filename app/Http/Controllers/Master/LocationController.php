<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Category;
use App\Models\Master\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
   public function index(){
      $loca=Location::all();
      $cat=Category::all();
    return view('Master.location',['loca'=>$loca,'cat'=>$cat]);
   }
//....location....//
   public function create(Request $request){
      $loc=new Location;
      $loc->location=$request->get('location');
      $loc->save();
      return redirect(route('Master.location'));
   }

   public function edit_location($id)
   {
       $editlocation = Location::find($id); 
       $loc = Location::all();
       return view('Master.editlocation',['editlocation'=>$editlocation,'loc'=>$loc]);
   }

   public function update_location(Request $request)
   {
      Location::where('id',$request->id)->update([ 'location'=>$request->location]);

       return redirect()->route('Master.location')->with(['success'=>true,'message'=>'Successfully Updated !']);
     
   }


   public function destroy_location($id)
   {
       $loc=Location::where('id',$id)->delete();
       return redirect(route('Master.location'));
   }

   //......category......//
   public function createcategory(Request $request)
     {
$cat=new Category;
$cat->add_category=$request->get('category');
$cat->save();
return redirect(route('Master.location'));
   }

   public function edit_category($id)
   {
       $editcat = Category::find($id); 
       $cat = Category::all();
       return view('Master.editcategory',['editcat'=>$editcat,'cat'=>$cat]);
   }

   public function update_category(Request $request)
   {
      Category::where('id',$request->id)->update([ 'add_category'=>$request->add_category]);

       return redirect()->route('Master.location')->with(['success'=>true,'message'=>'Successfully Updated !']);
     
   }

   public function destroycategory($id)
   {
       $cat=Category::where('id',$id)->delete();
       return redirect(route('Master.location'));
   }
}
// $city= new Addcity;
// $city->city_name=$request->get('city');
// $city->save(); 
// return redirect(route('city'));