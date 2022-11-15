<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\projetsDB;

class Projets extends Controller
{
    public function afficher(){
        return view('projets');
    }
    public function publish(){
        return view('publish');
    }

    public function publishT(){
        if (!isset($_POST['nom']) ||
        !isset($_POST['anneeReal']) ||
        !isset($_FILES['img']) ) {
        return redirect('/index');
        } else {
            if ($_FILES['img']['error'] != 0){
            return redirect('/erreur2');
        } else {
            $dirname = "./upload";
            $filename = session('id') . "_" . time();
            $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            $file = $dirname . "/" . $filename . "." . $extension;
            move_uploaded_file( $_FILES['img']['tmp_name'],$file);

            $p = new projetsDB();
            $p ->idAuteur = session('id');
            $p ->titre = $_POST['nom'];
            $p ->img_url=$file;
            $p ->dateEcrit=date("Y-m-d H:i:s");
            $p ->anneeReal=$_POST['anneeReal'];
            if(isset($_POST['lien'])){
                $p ->lien=$_POST['lien'];
            }
            $p ->save();
            return redirect('/index');
  }
}
    }
}
