<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    function index()
    {
    	return view('contact');
    }
    public function sendemail(Request $request)
    {
    	
    	$data = array(
			'name' =>$request->name,
			'email' =>$request->email,
			'pnumber' =>$request->pnumber,
			'subject' =>$request->subject,
    		'message' =>$request->message
    	);
    	Mail::to('felixosoro68@gmail.com')->send(new SendMail($data));
    	return back();
    }
}
