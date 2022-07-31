@extends('layouts.login')

@section('profile')
        <div class="card-body">
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
               <img src="{{ asset('storage/images/' .auth()->user()->images) }}" width="50px" height="50px" class="icon-image">
                <div class="mb-7 row">
                    {{Form::label('username','username',['class'=>'col-sm-2 col-form-label'])}}
                    <div class="col-sm-5">
                      {{Form::text('username', $user->username, ['class' => 'form-control', 'id' =>'username'])}}
                    </div>
                </div>
                <div class="mb-7 row">
                    {{Form::label('mail','mail adress',['class'=>'col-sm-2 col-form-label'])}}
                    <div class="col-sm-5">
                     {{Form::email('mail', $user->mail, ['class' => 'form-control', 'id' =>'mail'])}}
                    </div>
                </div>

                <div class="mb-7 row">
                    {!! Form::label('password','password',['class'=>'col-sm-2 col-form-label']) !!}
                     <div class="col-sm-5">
                    {!! Form::password('password',['class'=>'form-control']) !!}
                  </div>
                </div>

                <div class="mb-7 row">
                   {!! Form::label('password_confirm','password_confirm',['class'=>'col-sm-2 col-form-label']) !!}
                   <div class="col-sm-5">
                     {!! Form::password('password_confirm',['class'=>'form-control']) !!}
                   </div>
                </div>

               <div class="mb-7 row">
                    {!! Form::label('bio','bio',['class'=>'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-5">
                      {!! Form::text('bio',$user->bio,['class'=>'form-control']) !!}
                    </div>
               </div>

                <div class="mb-7 row">
                    {!! Form::label('images','icon image',['class'=>'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-5">
                     {!! Form::file('images',['class'=>'form-control','id'=>'inputdefault']) !!}
                    </div>
                </div>

                <div class="form-group pull-right">
                    {{Form::submit(' 更新する ', ['class'=>'btn btn-danger'])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
