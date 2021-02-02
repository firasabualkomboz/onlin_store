<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
class SendEmailController extends Controller
{
    function index(){
    return view('front.send_email');
    } // end function index

    function send(Request $request){

        $this -> validate($request,[

            'name'    =>  'required',
            'email'   =>  'required|email',
            'message' =>  'required',
        ]);

        $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->message
        );

        Mail::to('feras.out@gmil.com')->send(new SendEmail($data));
        return back()->with('success', 'شكراً لك تم إرسال الرسالة بنجاح');



    } // end function send
}
