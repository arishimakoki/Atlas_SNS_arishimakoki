@extends('layouts.login')

@section('search')
<form method="GET" action="{{ route('users.search') }}">
    <input type="search" placeholder="ユーザー名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif"></textarea>
    <div>
        <button type="submit">検索</button>
        <p>検索ワード：{{$search}}</p>
    </div>
</form>

@foreach($users as $user)
@if ($user->id !== Auth::user()->id)
         <img src="{{ asset('storage/images/' . $user->images) }}">
        {{ $user->username }}
    </a>
    @if(Auth::user()->isFollowing($user->id))
    <form method="POST" action="{{ route('unfollow', ['user' => $user->id]) }}">
    @csrf
    <button  type="submit" class="btn btn-outline-info btn-sm" >フォロー解除</button>
    </form>
    @else
    <form method="POST" action="{{ route('follow', ['user' => $user->id]) }}">
     @csrf
    <button type="submit" class="btn btn-outline-info btn-sm" >フォローする</button>
    </form>
    @endif
    @endif
@endforeach
@endsection
