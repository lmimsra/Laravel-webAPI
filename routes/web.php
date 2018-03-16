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
    $posts = Post::orderBy('created_at', 'asc')->get();
    return view('posts',['posts'=>$posts]);
});

Route::post('/send',function (Request $request){
    //バリデーション
    $validator = Validator::make($request->all(),['item_name' => 'required|max:255|min:3']);

    //バリデーションエラー
    if ($validator->false()){
        return redirect('/')
            ->withInput()
            ->withErrors();
    }

    //add post
    $posts = new Post;
    $posts->title = $request->item_name;
    $posts->body = 'test';
    $posts->save();
    return redirect('/');
});

Route::delete('post/{post}',function (Post $post){

});

//面白半分で書いた
Route::get('welcome','WelcomeController@welcome');