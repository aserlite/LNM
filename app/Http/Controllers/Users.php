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
        if(session('id')){
            return redirect('/projets');
        }
        return view('login');
    }

    function loginT(){
        if(session('id')){
            return redirect('/projets');
        }
        if (!isset($_POST['mail']) || !isset($_POST['pwd'])) {
            return redirect('/login');    
        } else {
            $user = UsersDB::where('email', '=', $_POST['mail'])
            ->where('mdp', '=', sha1($_POST['pwd']))
            ->get();
          
            if ($user->count() === 1) {
                session()->put('id',$user->first()->id);

              if (isset($_POST['rememberme'])) {
                  $token = bin2hex(random_bytes(20));
                  setcookie('token', $token, time() + 86400 );
              } else {
                  $token = '';
                  setcookie('token', $token, time() - 3600 );
              }
              UsersDB::where('id',$user->first()->id)->update(['remember'=>$token]);
                return redirect('/projets');    
            } else {
              
              return redirect('/login');    
            }
        }
    }

    function register(){
        if(session('id')){
            return redirect('/projets');
        }
        return view('register');
    }

    function registerT(){
        if(session('id')){
            return redirect('/projets');
        }
    echo "ts";
        if (!isset($_POST['inscription']) ||
    !isset($_POST['pwd']) ||
    !isset($_POST['pwd1']) ||
    !isset($_POST['Prenom']) ||
    !isset($_POST['Nom']) ||
    !isset($_POST['mail'])  ||
    !isset($_POST['year'])  ||
    filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL) === false ||
    $_POST['pwd'] != $_POST['pwd1'] ) {
      header('location: /register');
    } else {
        $u= new UsersDB();
        $u ->nom =  $_POST['Nom'];
        $u ->prenom =  $_POST['Prenom'];
        $u ->mdp = sha1($_POST['pwd']);
        $u ->email=$_POST['mail'];
        $u ->year=$_POST['year'];
        $u->CreationCompte = date("Y-m-d H:i:s");
        $u ->save();
        $id=$u->id;
        echo $id;
        session()->put('id',$id);
        return redirect('/index');
    }
    return redirect('/register');    
    }
        
    public function logout(){
    session()->flush();
    return redirect('/login');    
    }
        

    }