<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;

use App\Mail\MessageMail;

use Mail,Session;

class ContactController extends Controller
{
    public function index(Request $request){
        $contacts = Contact::all();

    	return view('front.contact.index',compact('contacts'));
    }

    public function sendMessage(){

    	Mail::to('noreply@gmail.com')->send(
    		new MessageMail(
    			request('email'),
    			request('subject'),
    			request('message'))
    	);

    	Session::flash('message_success','Your message is sent!');

    	return back();
    }
}
