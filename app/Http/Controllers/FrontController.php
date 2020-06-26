<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cms;
use App\Media;
use Validator;
use Mail;
use App\Mail\ContactUs;

class FrontController extends Controller
{
    
    /**
     * Show the static pages
     *
     * @return \Illuminate\Http\Response
     */
    public function getStaticPages($slug)
    {
        $staticdata = CMS::where('slug',$slug)->where('active',1)->first();
         if (is_null($staticdata)) {
            abort(404);
         }
        return view('static')->with('staticdata',$staticdata);
    }

}
