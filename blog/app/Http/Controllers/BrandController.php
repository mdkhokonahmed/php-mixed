<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    public function index(){

    	return view('pages.brand.addbrand');
    }

    public function StoreBrand(Request $request){

    	$this->validate($request,[
         'brandName' => 'required',
         'BrandDescription' => 'required'
         
     	],
     	[
     	'brandName.required' =>'Place Your brand Name!',
     	'BrandDescription.required' =>'Place Your Brand Description!',
     	]);
       
        $brand = new Brand;
        $brand->brandName = $request->brandName;
        $brand->BrandDescription = $request->BrandDescription;
        $brand->publicationStatus = $request->publicationStatus;
        $brand->save();
        return redirect('/addbrand')->with('message', 'Brand Added successfully');
    }
 
    public function BrandList(){
    	$brands = Brand::all();
    	return view('pages.brand.listbrand',['brands'=>$brands]);
    }

    public function BrandEdit($id){
     $brandById =Brand::where('id', $id)->first();
     return view('pages.brand.editbrand',['brandById'=>$brandById]);	

    }

    public function UpdateBrand(Request $request){
    	$this->validate($request,[
         'brandName' => 'required',
         'BrandDescription' => 'required'
         
     	],
     	[
     	'brandName.required' =>'Place Your brand Name!',
     	'BrandDescription.required' =>'Place Your Brand Description!',
     	]);

     	$brand = Brand::find($request->id);
     	$brand->brandName = $request->brandName;
        $brand->BrandDescription = $request->BrandDescription;
        $brand->publicationStatus = $request->publicationStatus;
        $brand->save();
        return redirect('/listbrand')->with('message', 'Brand Updated successfully');
    }

    public function DeleteBrand($id){
    	$brand = Brand::find($id);
    	$brand->delete();
    	return redirect('/listbrand')->with('message', 'Brand Deleted successfully');
    }
  


}
