<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/script.js"></script>

</head>
<body>
    <header>
         <div id="side-bar">
           <div id="confirm">
            <div class="users">
             <p><img src="{{ asset('storage/images/' .auth()->user()->images) }}" class="icon" width="50px" height="50px"></p>
             <p class="username"> {{ Auth::user()->username }}さん</p>
            </div>
               <div class="follows-count">
                 <p>フォロー数</p>
                  <p>{{ Auth::user()->follows()->count() }}名</p>
               </div>
               <p class="btn-follows"><a href="/follow-list" class="btn btn-light btn-sm">フォローリスト</a></p>
                <div class="followers-count">
                  <p>フォロワー数</p>
                  <p>{{ Auth::user()->followers()->count() }}名</p>
                </div>
                <p class="btn-follows"><a href="/follower-list" class="btn btn-light btn-sm">フォロワーリスト</a></p>
                  <div class="search-btn">
                    <p><a href="/search" class="btn btn-light">ユーザー検索</a></p>
                  </div>
                  <div class="navi">
                    <ul id="links01">
                      <nobr><li><a href="/top">
                      <img src="{{ asset('images/home.png') }}" alt="" width="40px" class="" >
                      HOME
                      </a></li></nobr>
                      <nobr><li><a href="/profile">
                      <img src="{{ asset('images/user.png') }}" alt="" width="40px" class="">
                      プロフィール編集
                      </a></li></nobr>
                      <nobr><li><a href="/logout">
                      <img src="{{ asset('images/logout.png') }}" alt="" width="40px" class="">
                      ログアウト
                      </a></li></nobr>
                    </ul>
                  </div>
             </div>
          </div>
     </header>
       <div id="row">
         <div id="container">
            <div id="content">
            @yield('content')
            </div>
            <div id="edit">
            @yield('edit')
            </div>
            <div id="search">
            @yield('search')
            </div>
            <div id="profile">
            @yield('profile')
            </div>
            <div id="followList">
            @yield('followList')
            </div>
            <div id="followerList">
            @yield('followerList')
            </div>
            <div id="show">
            @yield('show')
         </div>
      </div >
    <footer>
    </footer>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
    <script src="JavaScriptファイルのURL"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
