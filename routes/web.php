<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
use App\Http\Controllers\Articles;
use App\Http\Controllers\Sub;
use App\Http\Controllers\MainController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(session("login")){
        return view('articles');
    }else{
        return view('login');
    }
});

Route::get('/index', [MainController::class, 'index']);

Route::get('/login', [Users::class, 'login']);
Route::post('/loginT', [Users::class, 'loginT']);

Route::get('/register',[Users::class, 'register']);
Route::post('/registerT', [Users::class, 'registerT']);

Route::get('/publish',[Articles::class, 'publish']);
Route::get('/test',[Users::class,'test']);
