@extends('layouts.login')

@section('show')
<img src="{{ asset('storage/images/' . $users->images) }}">
<p>name</p>
{{ $users->username }}
<p>bio</p>
{{ $users->bio }}
 @if(Auth::user()->isFollowing($users->id))
    <form method="POST" action="{{ route('unfollow', ['user' => $users->id]) }}">
    @csrf
    <button type="submit" class="btn btn-outline-info btn-sm" >フォロー解除</button>
    </form>
    @else
    <form method="POST" action="{{ route('follow', ['user' => $users->id]) }}">
     @csrf
    <button type="submit" class="btn btn-outline-info btn-sm" >フォローする</button>
    </form>
    @endif
@foreach ($posts as $post)
@if($users->id == $post->user_id)
<img src="{{ asset('storage/images/' . $users->images) }}">
{{ $users->username }}
{{ $post->post }}
{{ $post->created_at }}
 @endif
@endforeach
@endsection
