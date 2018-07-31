<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coustomar;
use DB;

class CostomarController extends Controller
{
    public function index(){

    	return view('pages.coustomar.addcoustomar');
    }

   public function StoreCoustomar(Request $request){
   	  $this->validate($request,[
         'name' => 'required',
         'address' => 'required',
         'phone' => 'required',
         'eamil' => 'required'

     	],
     	[
     	'name.required' =>'place your name!',
     	'address.required' =>'place your Address!',
     	'phone.required' =>'place your Phone!',
     	'eamil.required' =>'place your email!',
     	]);
   	  $coustomar = new Coustomar;
   	  $coustomar->name = $request->name;
   	  $coustomar->address = $request->address;
   	  $coustomar->phone = $request->phone;
   	  $coustomar->eamil = $request->eamil;
      $coustomar->save();
     return redirect('/addcoustomar')->with('message', 'Coustomar Added successfully');
   } 

   public function ViewCoustomar(){
    $coustomars = DB::table('coustomars')->paginate(2);
   	return view('pages.coustomar.listcoustomar',['coustomars'=>$coustomars]);
   } 

   public function EditCoustomar($id){
   	 $coustomarById = Coustomar::where('id', $id)->first();
   	 return view('pages.coustomar.editcoustomar',['coustomarById'=>$coustomarById]);
   }

   public function UpdateCoustomar(Request $request){
   	 $this->validate($request,[
         'name' => 'required',
         'address' => 'required',
         'phone' => 'required',
         'eamil' => 'required'

     	],
     	[
     	'name.required' =>'place your name!',
     	'address.required' =>'place your Address!',
     	'phone.required' =>'place your Phone!',
     	'eamil.required' =>'place your email!',
     	]);

   	   $coustomar = Coustomar::find($request->id);
   	   $coustomar->name = $request->name;
   	   $coustomar->address = $request->address;
   	   $coustomar->phone = $request->phone;
   	   $coustomar->eamil = $request->eamil;
       $coustomar->save();
     return redirect('/listcoustomar')->with('message', 'Coustomar Address Updated successfully');
   }

   public function DeleteCoustomar($id){
    $coustomar = Coustomar::find($id);
    $coustomar->delete();
     return redirect('/listcoustomar')->with('message', 'Coustomar Address Deleted successfully');
   }

   



}
