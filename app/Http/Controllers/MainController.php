<?php

namespace App\Http\Controllers;

use App\Models\UsersDB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;
use App\Models\projetsDB;

class MainController extends Controller
{
    public function index(){
        $tab=projetsDB::select('img_url')->get();
        $result=[];
        foreach($tab as $a){
            $result[]=$a->img_url;
        };
        dd($result);
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
