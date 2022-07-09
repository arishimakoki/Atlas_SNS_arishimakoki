@extends('layouts.login')


@section('followList')
@foreach ($follows as $follows)
<a href="{{ url('show' ,['id'=>$follows->id]) }}" ><img src="{{ asset('storage/images/' . $follows->images) }}"></a>
@endforeach
@foreach ($posts as $posts)
   <tr>
     <th></th>
     <th>{{ $posts->username }}</th>
     <th><a href="{{ url('show' ,[$posts->followed_id]) }}" ><img src="{{ asset('storage/images/' . $posts->images) }}"></a></th>
     <th>{{ $posts->post }}</th>
     <th>{{ $posts->created_at }}</th>
     <th></th>
    </tr>
@endforeach
@endsection
