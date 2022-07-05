@extends('layouts.login')



@section('followerList')
<p>Follower List</p>
@foreach ($followers as $followers)
<a href="{{ url('users.profile' .$followers->followed_id) }}" ><img src="{{ asset('storage/images/' . $followers->images) }}"></a>
@endforeach
@foreach ($posts as $posts)
   <tr>
     <th></th>
     <th>{{ $posts->username }}</th>
     <th><a href="{{ url('users.profile' .$posts->followed_id) }}" ><img src="{{ asset('storage/images/' . $posts->images) }}"></a></th>
     <th>{{ $posts->post }}</th>
     <th>{{ $posts->created_at }}</th>
     <th></th>
    </tr>
@endforeach

@endsection
