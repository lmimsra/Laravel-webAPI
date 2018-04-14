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

use App\Post;
use Illuminate\Http\Request;


Route::get('/', function () {
    $posts = Post::orderBy('created_at', 'asc')->get();
    return view('posts',['posts'=>$posts]);
});

Route::post('/send',function (Request $request){
    //バリデーション
    $validator = Validator::make($request->all(),[
        'post_title' => 'required|max:100|min:3',
        'post_body' => 'required|min:3|max:255'
        ]);

    //バリデーションエラー
    if ($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    //add post
    $posts = new Post;
    $posts->title = $request->post_title;
    $posts->body = $request->post_body;
    $posts->save();
    return redirect('/');
});

Route::delete('post/{post}',function (Post $post){
    $post->delete();
    return redirect('/');

});

Route::post('editposts/{post}',function (Post $post){
    return view('editpost',[post=>$post]);
});

//面白半分で書いた
Route::get('welcome','WelcomeController@welcome');