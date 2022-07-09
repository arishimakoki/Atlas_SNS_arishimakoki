@extends('layouts.login')

@section('profile')
<img src="{{ asset('storage/images/' .auth()->user()->images) }}">
<div class="card w-50 mx-auto m-5">
        <div class="card-body">
            <div class="pt-2">
                <p class="h3 border-bottom border-secondary pb-3">プロフィール編集</p>
            </div>
            {!! Form::open(['route' => ['profile.update'], 'method' => 'PUT','enctype'=>'multipart/form-data']) !!}
            {!! Form::hidden('id',$user->id) !!}
            @method('patch')
            @if ($errors->any())
            <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
           </div>
              @endif
            <div class="m-3">
                <div class="form-group pt-1">
                    {{Form::label('username','username')}}
                    {{Form::text('username', $user->username, ['class' => 'form-control', 'id' =>'username'])}}
                </div>
                <div class="form-group pt-2">
                    {{Form::label('mail','mail adress')}}
                    {{Form::email('mail', $user->mail, ['class' => 'form-control', 'id' =>'mail'])}}
                </div>

                <div class="form-group">
                    {!! Form::label('password','password') !!}
                    {!! Form::password('password',['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirm','password_confirm') !!}
                    {!! Form::password('password_confirm',['class'=>'form-control']) !!}
                </div>

               <div class="form-group">
                    {!! Form::label('bio','bio') !!}
                    {!! Form::text('bio',$user->bio,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('images','icon image') !!}
                    {!! Form::file('images',['class'=>'form-control']) !!}
                </div>

                <div class="form-group pull-right">
                    {{Form::submit(' 更新する ', ['class'=>'btn btn-success rounded-pill'])}}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
