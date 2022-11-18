<?php

namespace App\Http\Controllers;

use App\Models\UsersDB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;

class MainController extends Controller
{
    public function index(){
        if(isset($_COOKIE['token'])){
            $c=$_COOKIE['token'];
            $user=UsersDB::where('remember', '=', $c)->get();
            if ($user->count()!=0){
                session()->put('id',$user->first()->id);
                return view('index');
            }else{
                return view('login');
            }
        }elseif(session('id')){
            return view('index');
        }else{
            return view('login');
        }
        
    }
}
