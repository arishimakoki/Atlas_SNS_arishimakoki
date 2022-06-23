@extends('layouts.login')

@section('search')
<form method="GET" action="{{ route('users.search') }}">
    <textarea name="search"cols="30" rows="1" placeholder="ユーザー名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif"></textarea>
    <div>
        <button type="submit">検索</button>
        <button>
            <a href="{{ route('users.search') }}" class="text-white">
                クリア
            </a>
        </button>
    </div>
</form>

@foreach($users as $user)
    <a href="{{ route('users.profile', ['user_id' => $user->id]) }}">
        {{ $user->username }}
    </a>
    @if(Auth::user()->isFollowing($user->id))
    <form method="POST" action="{{ route('unfollow', ['user' => $user->id]) }}">
    @csrf
    <button type="submit" class="btn btn-outline-info btn-sm" >フォロー解除</button>
    </form>
    @else
    <form method="POST" action="{{ route('follow', ['user' => $user->id]) }}">
     @csrf
    <button type="submit" class="btn btn-outline-info btn-sm" >フォローする</button>
    </form>
    @endif
@endforeach
@endsection
