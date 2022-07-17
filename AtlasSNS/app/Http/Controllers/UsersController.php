<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\File;

class UsersController extends Controller
{
    //
    public function profile(User $user){
        $user = Auth::user();
        return view('users.profile',['user' => $user]);
    }

     public function update(Request $request, User $user)
    {
         $validator = Validator::make($request->all(),[
          'username'  => 'required|min:2|max:12',
          'mail' => ['required', 'min:5', 'max:40', 'email', Rule::unique('users')->ignore(Auth::id())],
          'password' => 'min:8|max:20|string',
          'password_confirm' => 'required|same:password',
          'bio' => 'max:150',
          'images' => 'image',
        ]);

        $user = Auth::user();
        //画像登録
        $validator->validate();
        $user->update([
            'username' => $request->input('username'),
            'mail' => $request->input('mail'),
            'password' => bcrypt($request->input('password')),
            'bio' => $request->input('bio'),
        ]);
        if ($request->has('images')) {
         $image = $request->file('images')->store('public/images');
                 $user->update([
            'images' => basename($image),
        ]);
        }

        return redirect('top');
    }

    public function search(Request $request)
    {
        $users = User::All();
        // ユーザー一覧をページネートで取得
        $users = User::paginate(20);

        $search = $request->input('search');

        // クエリビルダ
        $query = User::query();

       // もし検索フォームにキーワードが入力されたら
        if ($search) {

            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);


            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('username', 'like', '%'.$value.'%');
            }

            $users = $query->paginate(20);

        }
        // ビューにusersとsearchを変数として渡す
        return view('users.search')
            ->with([
                'users' => $users,
                'search' => $search,
            ]);
    }
    public function follow(User $user)
    {
        $follower = Auth::user();
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following){
             $follower->follow($user->id);
        }
      return redirect('search');
}
public function unfollow(User $user)
    {
        Auth::user()->unfollow($user->id);

        return redirect('search');
    }
}
