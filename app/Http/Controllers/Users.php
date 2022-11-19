<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\UsersDB;
use Symfony\Component\HttpFoundation\Cookie;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Users extends Controller
{
    public function test(){
        $id=session('id');
        $result=UsersDB::select('qrcodetoken','prenom')->where('id',$id)->get();
        if($result->count()==1){
            $token=$result->first()->qrcodetoken;
            $lienimg=url('/checkqrcode').'/'.$token;
            $qrcode = QrCode::size(200)
                            ->color(8,114,145)
                            ->backgroundcolor(245,234,62)
                            ->generate($lienimg);

            $qrcode = base64_encode($qrcode);
            // return view('test',['qrcode'=>$qrcode]);
            $pdf = PDF::loadView('test',['qrcode'=>$qrcode])->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->stream();
        }else{
            return redirect('/genqrcode');
        }
        
        
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
        if (
        !isset($_POST['inscription']) ||
        !isset($_POST['pwd']) ||
        !isset($_POST['pwd1']) ||
        !isset($_POST['Prenom']) ||
        !isset($_POST['Nom']) ||
        !isset($_POST['mail'])  ||
        $_POST['year']==-1  ||
        filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL) === false ||
        $_POST['pwd'] != $_POST['pwd1'] ) {
        return redirect('/register');
        } else {
            $u= new UsersDB();
            $u ->nom =  $_POST['Nom'];
            $u ->prenom =  $_POST['Prenom'];
            $u ->mdp = sha1($_POST['pwd']);
            $u ->email=$_POST['mail'];
            $u ->year=$_POST['year'];
            if(isset($_POST['linkedin'])){
                $u ->linkedin=$_POST['linkedin'];
            }
            if(isset($_POST['portfolio'])){
                $u ->portfolio=$_POST['portfolio'];
            }
            $u->CreationCompte = date("Y-m-d H:i:s");
            $u ->save();
            $id=$u->id;
            echo $id;
            session()->put('id',$id);
            return redirect('/index');
        }
    }
        
    public function logout(){
    session()->flush();
    setcookie('token', '', time() - 3600 );
    return redirect('/');    
    }
    
    public function genqrcode(){
        $id=session('id');
        if(isset($id)){
            $usercode=UsersDB::select('qrcodetoken')->where('id','=',$id)->get();
            if($usercode->first()->qrcodetoken==NULL){
                $qrcodetoken=bin2hex(random_bytes(30));
                $u = UsersDB::where('id',$id)->update(['qrcodetoken'=>$qrcodetoken,'DateGenQrCode'=>date("Y-m-d H:i:s")]);
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/');
        }
        
    }

    public function checkqrcode($token){
        if(session('id')==5){
            if(strlen($token)==60){
                $result=UsersDB::select('nom','prenom','QrCodeUsed')->where('qrcodetoken',$token)->get();
                if($result->count()==1 ){
                    if($result->first()->QrCodeUsed === 0){
                        $updateentrée=UsersDB::where('qrcodetoken',$token)->update(['QrCodeUsed'=>TRUE]);
                        return view('qrcodebon',['prenom'=>$result->first()->prenom,'nom'=>$result->first()->nom]);
                    }else{
                        return view('qrcodefaux',['result'=>'Qr Code deja utilisé']);
                    }
                }else{
                    return view('qrcodefaux',['result'=>"Cet utilisateur n'apparait pas dans notre base de donnée ou n'as pas crée d'invitation"]);
                }
            }else{
                return view('qrcodefaux',['result'=>'erreur interne dans le qr code, contactez un organisateur']);
            }
        }else{
            return redirect('/mauvaisuser');
        }
        
    }

    public function afficherqrcode(){
        $id=session('id');
        $result=UsersDB::select('qrcodetoken','prenom')->where('id',$id)->get();
        if($result->count()==1){
            $token=$result->first()->qrcodetoken;
            $lienimg=url('/checkqrcode').'/'.$token;
            $qrcode = QrCode::size(200)
                            ->color(254,250,221)
                            ->backgroundcolor(13,15,44)
                            ->generate($lienimg);
            return view('invitation',['url'=>$lienimg,'qrcode'=>$qrcode,"prenom"=>$result->first()->prenom]);
        }else{
            return redirect('/genqrcode');
        }
    }
    }