<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    public function index(){
        $to_name="Trần Chiến";
        $to_email="tranchien021@gmail.com";

        $data=array('name'=>"Gửi email tới khách hàng","body"=>"Mail gửi về  hàng hoá");
        Mail::send('livewire.send_email',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject("Gủi email google");
            $message->from($to_email,$to_name);
        });

    }
}
