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
                $url=url('/');
                $id=session('id');
                $layout="layouts.topJC";
                return view('index',['url'=>$url,'id'=>$id,'layout'=>$layout]);
            }}
        $url=url('/');
        if(session('id')){
        $id=session('id');
        $layout="layouts.topJC";
        return view('index',['url'=>$url,'id'=>$id,'layout'=>$layout]);
        }else{
            $layout="layouts.topJ";
            return view('index',['url'=>$url,'layout'=>$layout]);
        }
    }

    public function mauvaisuser(){
        $url=url('/');
        $id=session('id');
        return view('mauvaisuser',['url'=>$url,'id'=>$id]);
    }
}
