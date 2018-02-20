<?php

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
use Illuminate\Http\Request;
use app\Post;

Route::get('/', function () {
    return view('posts');
});

Route::post('/send',function (Request $request){

});

Route::delete('post/{post}',function (Post $post){

});

//面白半分で書いた
Route::get('welcome','WelcomeController@welcome');