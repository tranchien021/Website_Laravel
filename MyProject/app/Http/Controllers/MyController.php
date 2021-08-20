<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Mymodel;


class MyController extends Controller
{
    public function index()
    {   
        $data=Mymodel::all();
        return view('welcome',compact('data'));
    }
    public function name(){
    	
    	return redirect()->route('a');
    }
    public function getURL(Request $request){
    	return $request->path();
    }
    public function getdata(){

        return view('about');
    }
    public function setCookie(){
        $response= new Response;
        $response->withCookie('Khoa','Laravel',0.1);
        echo "set cookie successful";
        return $response;
    }
    public function getcookie(Request $Request){
        echo "My cookie is: ";
        return $Request->cookie('Khoa');
    }
    public function getfile(){
        return view('about');
    }
    public function show(){
        $data=Mymodel::all();
        return view('about',compact('data'));
    }
    public function check($id){
        echo 'ID can check : '. $id;
    }
    public function login(){
        return view('login');
    }
    public function shop(){
        return view('livewire.shop-component');
    }

}
