@extends('layouts.login')

@section('content')
<div id="container">
  <div class="seach">
    {!!Form::input(
        'text',
        'newPost',
        null,
        ['required', 'class' =>
          'form-control', 'placeholder' =>
            'ユーザー名']
      )!!}
  </div>
  <button type="submit" class="" name="">
    <img src="images/search.png" alt="検索ボタン" width="25px" height="25px">
  </button>


  <div class="userIndex">
    <table>
      @foreach ($all_users as $user)
      <tr>
        <td> <img class="image-circle" src="{{ asset('images/' . $user->images ) }}" alt=""> </td>
        <td>{{ $user->username }}</td>
        <td>
          @include('follows.follow_button', ['user'=>$user])
        </td>
      </tr>
      @endforeach
    </table>
  </div>

</div>





@endsection
