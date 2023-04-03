@extends('layouts.login')


@section('followList')
<div class="card-body">
  <div class="follow">
    <h1>Follow List</h1>
  </div>
  <div class="follow-list">
    @foreach ($follows as $follows)
          <a href="{{ url('show' ,['id'=>$follows->id]) }}" ><img src="{{ asset('storage/images/' . $follows->images) }}" width="50px" height="50px"></a>
    @endforeach
  </div>
</div>
@foreach ($posts as $posts)
<table class="table table-striped task-table">
   <tr>
     <td class="table-img">
       <div><a href="{{ url('show' ,[$posts->followed_id]) }}" ><img src="{{ asset('storage/images/' . $posts->images) }}" width="50px" height="50px"></a></div>
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
