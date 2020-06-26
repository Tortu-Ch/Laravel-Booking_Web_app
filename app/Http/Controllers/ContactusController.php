<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Mail\ContactUsEmailtoUser;
use App\Mail\ContactUsEmailtoAdmin;
use App\Contactus;
class ContactusController extends Controller
{
    /**
     * Show the Contact Us Page
     *
     * @return \Illuminate\Http\Response
     */

    public function showContactUsForm()
    {   
        return view('contact_us');
    }

    /**
     * save contact data and send email
     *
     * @return \Illuminate\Http\Response
     */

    public function postContactUs(Request $request){

        $validator = Validator::make($request->all(), [

            'name'         => 'required',
            'email'        => 'required|email',
            'message'      => 'required',

        ]);

        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        /* save into database */
        $contactus = new Contactus;
        $contactus->name  = $request->input('name');
        $contactus->subject  = $request->input('subject');
        $contactus->contactno  = $request->input('contactno');
        $contactus->email  = $request->input('email');
        $contactus->message  = $request->input('message');
        $contactus->save();

        $emailtouser = new ContactUsEmailtoUser($contactus);

        $emailtoadmin = new ContactUsEmailtoAdmin($contactus);

        $emailid = env('ADMIN_MAIL');

        \Mail::to($request->email)->send($emailtouser);

        \Mail::to($emailid)->send($emailtoadmin);

        \Session::flash('message', 'Thank you for contacting us. We will get back to you within 24 hours!!');

        return back();
    }

    public function index()
    {
        $contact_us=Contactus::all();
        return $contact_us;
    }

    
}
