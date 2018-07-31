<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Studentpayment;
use App\Department;

class PaymentController extends Controller
{
   public function addpayment(){
   	$departments = DB::table('departments')->get();

   	return view('admin.payment.addpayment',['departments'=>$departments]);

   }

   public function StorePayment(Request $request){

   	 DB::table('studentpayments')->insert([
    	 	'roll' => $request->roll,
    	 	'datecur' => $request->datecur,
    	 	'stdname' => $request->stdname,
    	 	'deptId' => $request->deptId,
    	 	'month' => $request->month,
    	 	'monthrat' => $request->monthrat,
    	 	'total' => $request->total,
    	 	'payment' => $request->payment,
    	 	'description' => $request->description,
    	 	'subtotal' => $request->subtotal,
    	 	'balance' => $request->balance,
    	 	'mode' => $request->mode,
    	 	'due' => $request->due,
    	 	]);

    	 return redirect('/addpayment')->with('message', 'Payment Added Successfully');
   }




}
