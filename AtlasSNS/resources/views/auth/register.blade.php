@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/register']) !!}
<p>新規ユーザー登録</p>
<div class="form">
{{ Form::label('user name') }}
{{ Form::text('username',null,['class' => 'input']) }}<br>

{{ Form::label('mail adress') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::label('password confirm') }}
{{ Form::password('password_confirm',['class' => 'input']) }}

{{ Form::submit('REGISTER',['class' => 'submit']) }}
</div>
@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}

@endsection
