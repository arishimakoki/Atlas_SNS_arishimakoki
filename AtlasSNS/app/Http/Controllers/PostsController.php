<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;


class PostsController extends Controller
{
    //
    //public function index(){
        //return view('posts.index');
    //}

    public function index()
    {
     $posts = Post::get()
     ->sortByDesc('created_at');
     $posts = Post::query()
    ->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->orWhere('user_id', Auth::user()->id)->latest()->get();


      return view('posts.index',[
      'posts'=> $posts
       ]);
    }

    public function store(Request $request)
{
    //バリデーション
    $validator = Validator::make($request->all(), [
       'post' => 'required|max:150',
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
      $posts->id;
      $posts->save();
       return redirect('top');
}

    public function edit($id)
    {
        $posts = Post::find($id);

        if (auth()->user()->id != $posts->user_id) {
            return redirect(route('top'));
        }
        return view('posts/edit')->with('post', $posts);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
      $up_post = $request->input('upPost');
      Post::query()
      ->where('id', $id)
      ->update(
        ['post' => $up_post]
      );
        return redirect('top');
     }


 public function destory($id)
    {
        $posts = Post::find($id);
        if (auth()->user()->id != $posts->user_id) {
            return redirect(('top'));
        }
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('top');
    }

    public function show(Request $request,$id,User $user)
    {
    $users = User::find($id);
    $posts = Post::all()
    ->sortByDesc('created_at');
     $param = [
            'users'=>$users,
            'posts'=>$posts,
        ];
    return view('users.show',$param);
    }
}
