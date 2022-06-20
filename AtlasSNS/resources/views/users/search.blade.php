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
@endforeach
@endsection
