<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Validator;

class PostsController extends Controller
{
    //
    //public function index(){
        //return view('posts.index');
    //}

    public function index()
    {
     $posts = Post::get();

      return view('posts.index',[
      'posts'=> $posts
       ]);
    }

    public function store(Request $request)
{
    //バリデーション
    $validator = Validator::make($request->all(), [
       'post' => 'required|max:255',
    ]);

    //バリデーションエラー
    if ($validator->fails()) {
      return redirect('top')
        ->withInput()
           ->withErrors($validator);
   }

     //以下に登録処理を記述（Eloquentモデル）
      $posts = new Post;
      $posts->post = $request->post;
      $posts->user_id = Auth::id();//ここでログインしているユーザidを登録しています
      $posts->save();

       return redirect('top');
}
}
