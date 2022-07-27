@extends('layouts.login')

@section('content')
 <div class="card-body-text">
    <!-- 投稿フォーム -->
    @if( Auth::check() )
      <form action="{{ url('posts') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
         <!-- 投稿の本文 -->
         <div class="form-group">
            <img src="{{ asset('storage/images/' .auth()->user()->images) }}" width="50px" height="50px">
            <textarea name="post" placeholder="投稿内容を入力してください" class="form-text" style="border:none;"></textarea>
         </div>
           <!--　登録ボタン -->
            <button type="image" class="col-sm-offset-3 col-sm-6">
              <img src="images/post.png" alt="" width="70px">
            </button>
       </form>
     @endif
 </div>
  <!-- 全ての投稿リスト -->
  @if (count($posts) > 0)
    <table class="table table-striped task-table">
      <!-- テーブル本体 -->
      <tbody>
        @foreach ($posts as $post)
        <tr>
          <td class="table-image">
            <img src="{{ asset('storage/images/' . $post->user->images) }}" width="50px" height="50px">
          </td>
      <!-- 投稿者名の表示 -->
            <td class="table-text" style="width: 68%;">
               <div>{{ $post->user->username }}</div>
               <div class="table-post">{!! nl2br(htmlspecialchars($post->post)) !!}</div>
            </td>
      <!-- 投稿時間　-->
            <td class="table-text">
                <div class="table-time">{{ $post->created_at  }}</div>
            </td>
            <td style="width: 15%;">
              @if (!Auth::guest() && Auth::user()->id == $post->user_id)
      <!-- 投稿の編集ボタン -->
                <div class="content">
                   <a class="btn" data-toggle="modal" data-target="#Modal" data-whatever="{{ $post->post }}" data-post-id="{{$post->id}}">
                     <img src="{{ asset('images/edit.png') }}" alt="編集" width="40px" class="button-edit">
                   </a>
                </div>
               @endif
              @if (!Auth::guest() && Auth::user()->id == $post->user_id)
               <form action="{{route('posts.destroy', $post->id)}}" method="post" class="float-right">
                  @csrf
                  @method('delete')
                    <button type="image" onclick="return confirm('本当に削除しますか？');"><img src="images/trash-h.png" alt="" height="50px" class="button-delete"></button>
                </form>
              @endif
            </td>
        </tr>
       @endforeach
      </tbody>
    </table>
  @endif
      <!-- ツイート編集用モーダル -->
<div class="modal fade" id="Modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('posts.update', ['id' => $post->id ]) }}" method="post">
        <div class="modal-body">
          <input type="hidden" name="_method" value="PUT">
          <input id="id" class="form-control" type="hidden" name="id" value="">
          <input maxlength="150" id="post" class="form-control" type="textarea" name="upPost" value="" >
        </div>
            <button type="submit" class="edit">
              <img src="{{ asset('images/edit.png') }}" alt="編集" width="25px">
            </button>
              {{ csrf_field() }}
      </form>
    </div>
  </div>
</div>

@endsection
