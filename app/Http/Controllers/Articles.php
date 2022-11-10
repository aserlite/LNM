<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Articles extends Controller
{
    public function publish(){
        return view('publish');
    }
}
