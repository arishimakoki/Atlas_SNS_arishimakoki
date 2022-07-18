@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/login']) !!}

<p>AtlasSNSへようこそ</p>
<div class="form">
{{ Form::label('mail adress') }}<br>
{{ Form::text('mail',null,['class' => 'input']) }}<br>
{{ Form::label('password') }}<br>
{{ Form::password('password',['class' => 'input']) }}<br>
</div>
{{ Form::submit('LOGIN',['class' => 'submit']) }}
<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
