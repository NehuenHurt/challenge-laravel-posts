<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
   public function index(){
       return view("contacto/index");
   }

   public function sendEmail(Request $request){
       $subject = $request->asunto;
       $for = $request->email;
        Mail::send('contacto/email',$request->all(), function($msj) use($subject,$for){
           $msj->from("challengelaravel@gmail.com","Challenge laravel");
           $msj->subject($subject);
           $msj->to($for);
       });
       return back()->with('status', 'El Email ha sido enviado con exito!');
    }
}
