<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        var_dump(session('id'));
        return view('page2');
    }
}
