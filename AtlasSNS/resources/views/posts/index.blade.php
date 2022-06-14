@extends('layouts.login')

@section('content')
<div class="card-body">
  <div class="card-title">
    投稿フォーム
  </div>
    <!-- 投稿フォーム -->
    @if( Auth::check() )
      <form action="{{ url('posts') }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}
      <!-- 投稿の本文 -->
      <div class="form-group">
      投稿の本文
        <div class="col-sm-6">
          <textarea name="post" id="" cols="30" rows="10"class="form-control"></textarea>
        </div>
      </div>
      <!--　登録ボタン -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-primary">
            Save
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
        <!-- テーブルヘッダ -->
        <thead>
          <th>投稿一覧</th>
          <th> </th>
        </thead>
        <!-- テーブル本体 -->
        <tbody>
          @foreach ($posts as $post)
            <tr>
              <!-- 投稿詳細 -->
              <td class="table-text">
                <div>{{ $post->post }}</div>
              </td>
              <!-- 投稿者名の表示 -->
              <td class="table-text">
                <div>{{ $post->user->name }}</div>
              </td>
          </tr>
        @endforeach
     </tbody>
    </table>
  </div>
</div>
@endif
@endsection
