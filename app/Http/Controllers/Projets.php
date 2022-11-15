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
            if ($_FILES['img']['error'] != 0 || $_FILES['img']['type'] != 'image/jpeg'){
            return redirect('/index');
        } else {
            $dirname = "./public/upload";
            $filename = $_SESSION['id'] . "_" . time();
            $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            $file = $dirname . "/" . $filename . "." . $extension;
            move_uploaded_file( $_FILES['img']['tmp_name'],$file);

            $p = new projetsDB();
            $p ->titre = $_POST['titre'];
            $p ->img_url=$file;
            $p ->year=$_POST['year'];
            $p ->save();
            return redirect('/index');
  }
}
    }
}
