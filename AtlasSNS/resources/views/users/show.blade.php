@extends('layouts.login')

@section('show')
<div class="card-body">
    <div class="show-profile">
      <img src="{{ asset('storage/images/' . $users->images) }}" width="50px" height="50px" class="show-img">
       <div class="user-profile">
         <div class="name"> name  <div class="user-name">{{ $users->username }}</div></div>
         <div class="user-bio" >bio <div class="bio">{{ $users->bio }}</div></div>
       </div>
    </div>
      <div class="follow-button">
        @if(Auth::user()->isFollowing($users->id))
          <form method="POST" action="{{ route('unfollow', ['user' => $users->id]) }}">
        @csrf
          <button type="submit" class="btn btn-danger" >フォロー解除</button>
          </form>
        @else
          <form method="POST" action="{{ route('follow', ['user' => $users->id]) }}">
        @csrf
          <button type="submit" class="btn btn-primary" >フォローする</button>
          </form>
        @endif
      </div>
    </div>
@foreach ($posts as $post)
@if($users->id == $post->user_id)
<table class="table table-striped task-table">
   <tr>
      <td class="table-image">
          <img src="{{ asset('storage/images/' . $users->images) }}" width="50px" height="50px">
      </td>
     <td class="table-text" style="width: 70%;">
       {{ $users->username }}
       <div class="table-post">{!! nl2br(htmlspecialchars($post->post)) !!}</div>
      </td>
     <td class="table-text" style="width: 15%;">
       <div class="table-time">{{ $post->created_at }}</div>
      </td>
    </tr>
</table>

 @endif
@endforeach
@endsection
