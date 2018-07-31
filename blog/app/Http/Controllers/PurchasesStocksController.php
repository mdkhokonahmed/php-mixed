<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchasesStocks;

class PurchasesStocksController extends Controller
{
   public function index(){
     
   	return view ('pages.purchases.addpurchases');
   }
 
 public function StorePurchases(Request $request){

 	    $Purchases = new PurchasesStocks;
        $Purchases->supplier = $request->supplier;
        $Purchases->address1 = $request->address1;
        $Purchases->phone = $request->phone;
        $Purchases->email = $request->email;
        $Purchases->name = $request->name;
        $Purchases->quantity = $request->quantity;
        $Purchases->brate = $request->brate;
        $Purchases->srate = $request->srate;
        $Purchases->total = $request->total;
        $Purchases->payment = $request->payment;
        $Purchases->description = $request->description;
        $Purchases->subtotal = $request->subtotal;
        $Purchases->balance = $request->balance;
        $Purchases->mode = $request->mode;
        $Purchases->save();
        return redirect('/purchasesstock')->with('message', 'Purchases Added successfully');
 }

  public function PurchasesList(){
      $Purchases = PurchasesStocks::paginate(2);
  	return view ('pages.purchases.listpurchases',['Purchases'=>$Purchases]);
  }

  public function PurchasesEdit($id){
     $PurchasesById = PurchasesStocks::where('id', $id)->first();
  	return view ('pages.purchases.editpurchases',['PurchasesById'=>$PurchasesById]);
  }

  public function Purchasesupdate(Request $request){

  	    $Purchases = PurchasesStocks::find($request->id);
        $Purchases->supplier = $request->supplier;
        $Purchases->address1 = $request->address1;
        $Purchases->phone = $request->phone;
        $Purchases->email = $request->email;
        $Purchases->name = $request->name;
        $Purchases->quantity = $request->quantity;
        $Purchases->brate = $request->brate;
        $Purchases->srate = $request->srate;
        $Purchases->total = $request->total;
        $Purchases->payment = $request->payment;
        $Purchases->description = $request->description;
        $Purchases->subtotal = $request->subtotal;
        $Purchases->balance = $request->balance;
        $Purchases->mode = $request->mode;
        $Purchases->save();
        return redirect('/viewpurchases')->with('message', 'Purchases Updated successfully');
  }

  public function PurchasesDelete($id){
  	$Purchases = PurchasesStocks::find($id);
  	$Purchases->delete();
  	return redirect('/viewpurchases')->with('message', 'Purchases Deleted successfully');
  }



   
}
