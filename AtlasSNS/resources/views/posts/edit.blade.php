@extends('layouts.login')

@section('edit')
<div class="container">
    <form action="{{route('posts.update', $post->id)}}" method="post">
        @csrf
        @method('patch')
        <input type="hidden" name="id" value="{{$post->id}}">
        <div class="form-group">
            <textarea name="post" id="post" class="form-control" rows="5" placeholder="本文を入力してください">{{old('post') ?? $post->post}}</textarea>
        </div>
        <button type="submit" value="決定" class="btn btn-primary">決定</button>
    </form>
</div>
@endsection
