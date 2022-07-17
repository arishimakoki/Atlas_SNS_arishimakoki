@extends('layouts.login')

@section('content')
<div class="card-body">
    <!-- 投稿フォーム -->
    @if( Auth::check() )
      <form action="{{ url('posts') }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}
      <!-- 投稿の本文 -->
      <div class="form-group">
          <textarea name="post" placeholder="投稿内容を入力してください" class="form-control"></textarea>
      </div>
      <!--　登録ボタン -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="image" class="btn btn-primary">
            <img src="images/post.png" alt="" height="40px">
          </button>
        </div>
      </div>
    </form>
  @endif
</div>
  <!-- 全ての投稿リスト -->
  @if (count($posts) > 0)
    <div class="card-body">
      <div class="card-body">
        <table class="table table-striped task-table">
        <!-- テーブル本体 -->
        <tbody>
          @foreach ($posts as $post)
            <tr>
              <td>
                <img src="{{ asset('storage/images/' . $post->user->images) }}">
              </td>
               <!-- 投稿者名の表示 -->
              <td class="table-text">
                <div>{{ $post->user->username }}</div>
              </td>
              <!-- 投稿詳細 -->
              <td class="table-text">
                <div>{{ $post->post }}</div>
              </td>
                <td class="table-text">
                <div>{{ $post->created_at  }}</div>
              </td>
              <td>
                @if (!Auth::guest() && Auth::user()->id == $post->user_id)
                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary"><img src="images/edit.png" alt="" height="40px"></a>
                @endif
              </td>
              <td>
                @if (!Auth::guest() && Auth::user()->id == $post->user_id)
                <form action="{{route('posts.destroy', $post->id)}}" method="post" class="float-right">
                @csrf
                @method('delete')
                <button type="image" class="btn btn-danger" onclick="return confirm('本当に削除しますか？');"><img src="images/trash-h.png" alt="" height="30px"></button>
                </form>
               @endif
              </td>
          </tr>
        @endforeach
     </tbody>
    </table>
  </div>
</div>
@endif
<script>
function deletePost(e) {
    'use strict';
    if (confirm('本当に削除しますか？')){
        document.getElementById('delete_'+ e.dataset.id).submit();
    }
}
</script>
@endsection
