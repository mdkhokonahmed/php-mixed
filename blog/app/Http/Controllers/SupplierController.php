<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    public function index(){

    return view('pages.supplier.addsupplier');
    }

   public function StoreSupplier(Request $request){

   	$this->validate($request,[
         'name' => 'required',
         'address' => 'required',
         'phone' => 'required',
         'email' => 'required'

     	],
     	[
     	'name.required' =>'place your name!',
     	'address.required' =>'place your Address!',
     	'phone.required' =>'place your Phone!',
     	'email.required' =>'place your email!',
     	]);
   	  $supplier = new Supplier;
   	  $supplier->name = $request->name;
   	  $supplier->address = $request->address;
   	  $supplier->phone = $request->phone;
   	  $supplier->email = $request->email;
      $supplier->publicationStatus = $request->publicationStatus;
      $supplier->save();
     return redirect('/addsupplier')->with('message', 'Supplier Added successfully');
   } 

  public function ViewSupplier(){
     $suppliers = Supplier::all();
    return view('pages.supplier.supplierlist',['suppliers'=>$suppliers]);
  }

  public function EditSupplier($id){
  	$supplierById = Supplier::where('id', $id)->first();
   	return view('pages.supplier.editsupplier',['supplierById'=>$supplierById]);
  }

  public function UpdateSupplier(Request $request){

  	$this->validate($request,[
         'name' => 'required',
         'address' => 'required',
         'phone' => 'required',
         'email' => 'required'

     	],
     	[
     	'name.required' =>'place your name!',
     	'address.required' =>'place your Address!',
     	'phone.required' =>'place your Phone!',
     	'email.required' =>'place your email!',
     	]);

  	   $supplier = Supplier::find($request->id);
   	   $supplier->name = $request->name;
   	   $supplier->address = $request->address;
   	   $supplier->phone = $request->phone;
   	   $supplier->email = $request->email;
        $supplier->publicationStatus = $request->publicationStatus;
       $supplier->save();
     return redirect('/listsupplier')->with('message', 'Suppliers Address Updated successfully');
  }
  
  public function DeleteSupplier($id){
  	$supplier = Supplier::find($id);
    $supplier->delete();
    return redirect('/listsupplier')->with('message', 'Suppliers Address Deleted successfully');
  }






}
