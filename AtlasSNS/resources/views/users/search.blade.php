@extends('layouts.login')

@section('search')
<div class="card-body">
  <div class="search-form">
    <form method="GET" action="{{ route('users.search') }}">
      <input type="text" placeholder="ユーザー名" name="search" value="@if (isset($search)) {{ $search }} @endif" class="sarch-text" cols="30" rows="2">
      </input>
      <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
         </div>

        @if(isset( $search ))
          <div class="search-word">
            <p>検索ワード：{{$search}}</p>
          </div>
        @endif
    </form>
</div>
@foreach($users as $user)
@if ($user->id !== Auth::user()->id)
  <div class="search-list">
        <img src="{{ asset('storage/images/' . $user->images) }}" width="50px" height="50px">
        <div class="username">{{ $user->username }}</div>
            <div class="follow-button">
            @if(Auth::user()->isFollowing($user->id))
                <form method="POST" action="{{ route('unfollows', ['user' => $user->id]) }}">
            @csrf
                <button  type="submit" class="btn btn-danger" >フォロー解除</button>
                </form>
            @else
                <form method="POST" action="{{ route('follows', ['user' => $user->id]) }}">
            @csrf
                <button type="submit" class="btn btn-primary" >フォローする</button>
                </form>
            @endif
            </div>
        </div>
    @endif
@endforeach
@endsection
