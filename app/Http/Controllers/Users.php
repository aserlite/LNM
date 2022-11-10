<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\UsersDB;

class Users extends Controller
{
    public function test(){
        $results = UsersDB::where('login', '=', "zizi")
            ->where('mdp', '=', sha1("123"))
            ->get();
        echo($results->first()->login);
        echo($results->count());
        dd($results);
        return view('page2');
    }
    function login(){
        return view('login');
    }

    function loginT(){
        if (!isset($_POST['mail']) || !isset($_POST['pwd'])) {
            return redirect('/login');    
        } else {
            $user = UsersDB::where('email', '=', $_POST['mail'])
            ->where('mdp', '=', sha1($_POST['pwd']))
            ->get();
          
            if ($user->count() === 1) {
                session()->put('id',$user->first()->id);
                session()->put('login',$user->first()->login);

              if (isset($_POST['rememberme'])) {
                  $token = bin2hex(random_bytes(20));
                  setcookie('token', $token, time() + 86400 );
              } else {
                  $token = '';
                  setcookie('token', $token, time() - 3600 );
              }
              UsersDB::where('id',$user->first()->id)->update(['remember'=>$token]);
                return redirect('/articles');    
            } else {
              
              return redirect('/login');    
            }
        }
    }

    function register(){
        return view('register');
    }

    function registerT(){
    echo "ts";
        if (!isset($_POST['inscription']) ||
    !isset($_POST['pwd']) ||
    !isset($_POST['pwd1']) ||
    !isset($_POST['login']) ||
    !isset($_POST['mail'])  ||
    filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL) === false ||
    $_POST['pwd'] != $_POST['pwd1'] ) {
      header('location: /register');
    } else {
        $u= new UsersDB();
        $u ->login =  $_POST['login'];
        $u ->mdp = sha1($_POST['pwd']);
        $u ->email=$_POST['mail'];
        $u ->save();
        $id=$u->id;
        echo $id;
        session()->put('id',$id);
        session()->put('login',$_POST['login']);
        return redirect('/index');
    }
    return redirect('/register');    
    }
        
        

    }