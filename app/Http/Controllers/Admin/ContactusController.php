<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Contactus;
use App\Mail\ContactUsReply;
class ContactusController extends Controller
{
   
    public function index()
    {
        $contact_us=Contactus::orderBy('created_at', 'desc')->get();
       return view('admin.contact_us.index')->with('contact_us', $contact_us);
    }

     public function reply($id)
    {
        $contact_us=Contactus::find($id);
        return view('admin.contact_us.reply')->with('contact_us', $contact_us);
    }

    public function reply_send(Request $request,$id)
    {
    	$validator = Validator::make($request->all(), [

            'name'         => 'required',
            'email'        => 'required|email',
            'message'      => 'required',
            'reply'        => 'required',

        ]);

        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        
        try
        {
        $contact_us=Contactus::find($id);
        $contact_us->reply=$request->reply;
        $status= $contact_us->save();
        if($status)
        {

        $reply_email = new ContactUsReply($contact_us);
        \Mail::to($request->email)->send($reply_email);

        return redirect('admin/contact_us')->with('message','Successfully Replied to '.$contact_us->name);

        }
    }
    catch (\Exception $e) {
        
             return redirect('admin/contact_us')->withErrors('message','Reply operation failed');
        }
       
    }
}
