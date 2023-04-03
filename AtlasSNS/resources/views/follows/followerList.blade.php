@extends('layouts.login')



@section('followerList')
<div class="card-body">
  <div class="follow">
    <h1>Follower List</h1>
  </div>
  <div class="follow-list">
    @foreach ($followers as $followers)
      <a href="{{ url('show' ,['id'=>$followers->id]) }}" ><img src="{{ asset('storage/images/' . $followers->images) }}" width="50px" height="50px"></a>
    @endforeach
  </div>
</div>
@foreach ($posts as $posts)
<table class="table table-striped task-table">
   <tr>
      <td class="table-image">
       <a href="{{ url('show' ,[$posts->following_id]) }}" ><img src="{{ asset('storage/images/' . $posts->images) }}" width="50px" height="50px"></a>
      </td>
     <td class="table-text" style="width: 70%; font-size: large;">
       {{ $posts->username }}
       <div class="table-post">{!! nl2br(htmlspecialchars($posts->post)) !!}</div>
      </td>
     <td class="table-text" style="width: 15%;">
       <div class="table-time">{{ $posts->created_at }}</div>
      </td>
    </tr>
</table>
@endforeach

@endsection
