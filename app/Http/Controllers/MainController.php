<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        if(session('id')){
            return view('index');
        }else{
            return view('login');
        }
        
    }
}
