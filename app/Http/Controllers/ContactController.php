<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactStoreRequest;
use Mail;
use App\Models\Inquiry;

class ContactController extends Controller
{

	/**
	 * Return the view for the contact page
	 * @return \Illuminate\View\View
	 */
	public function index(): object
	{
		 return view('contact');
	}

	/**
	 * This function is used to handle contact form submit
	 * Store Message | Send Email
	 * 
	 * @param ContactStoreRequest $request
	 * @return Illuminate\Http\JsonResponse
	 */
    public function sendMessage(ContactStoreRequest $request): object
    {
        $validated = $request->validated();

        /*
        	It was not specified in the task when to insert the data this is why I am inserting it here
        	in real world example we would have something like admin dashboard so i decided to insert it
        	no matter if the email was successfully sent to the admin
        */
        $inquiry = Inquiry::create($validated);
        
        if($inquiry->exists) {
        	Mail::to('asd@gmail.com')->send(new \App\Mail\Contact($validated));

	    	if( count(Mail::failures()) > 0 ) {
	    		return response()->json(["text" => "Something went wrong!","sent" => false],422);
	    	}
        } else {
    		return response()->json(["text" => "Something went wrong!","sent" => false],422);
        }


    	return response()->json(["text" => "Thank you for contacting us!","sent" => true]);
    }
}
