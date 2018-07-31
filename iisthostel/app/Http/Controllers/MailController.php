<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function contact(){
    	return view('emails.contact');
    }

    public function MailPost(Request $request){
       
        $this->validate($request,[
         'email' => 'required',
         'subject' => 'required',
         'address' => 'required'
     	],
     	[
     	'email.required' =>'Place Your Eamil Address!',
     	'subject.required' =>'Place Your Subject!',
     	'address.required' =>'Place Your Any choice Text!'
     	
     	]);

     	$data = array(
     		'email' => $request->email,
     		'from'  => 'playmom56@gmail.com',
     		'subject'=> $request->subject,
     		'address' => $request->address,
     		);

     	Mail::send('emails.contact', $data, function($message) use ($data){
     		$message->to($data['email']);
     		$message->subject($data['subject']);
     		$message->from($data['from']);
     	});

     	return redirect('/contact')->with('message', 'Mail Send Successfully');





    }
}
