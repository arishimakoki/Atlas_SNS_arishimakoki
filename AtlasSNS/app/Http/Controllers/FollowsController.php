<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
use App\Follow;

class FollowsController extends Controller
{
    //
    public function followList(Post $post)
    {
    $follows = auth()->user()->follows()->get();
    $user = auth()->user();
    $posts = \DB::table('users')
     ->join('follows', 'follows.followed_id', '=', 'users.id')
     ->join('posts', 'posts.user_id', '=', 'follows.followed_id')
     ->where('follows.following_id', '=', $user->id)
     ->get();
        return view('follows.followList',['posts' => $posts,'follows' => $follows]);
    }

    public function followerList(){
    $followers = auth()->user()->followers()->get();
    $user = auth()->user();
    $posts = \DB::table('users')
     ->join('follows', 'follows.following_id', '=', 'users.id')
     ->join('posts', 'posts.user_id', '=', 'follows.following_id')
     ->where('follows.followed_id', '=', $user->id)
     ->get();
   return view('follows.followerList',['posts' => $posts,'followers' => $followers]);

    }

}
