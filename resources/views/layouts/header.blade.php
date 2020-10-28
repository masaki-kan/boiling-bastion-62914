<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!---<script src="{{ asset('/js/app.js') }}" defer></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!--awesome font-->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <!--bootstarap css--->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/calendar.css') }}" rel="stylesheet">
    <!--bootsarap javascript-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>
<body>
  <!-- ローディング画面 -->
  <div id="loading">
    <div class="spinner"></div>
    <div class="text">loading</div>
  </div>
  <script type="text/javascript">
  $(window).on('load',function(){
    endLoading();
  });
  //ローディング非表示処理
function endLoading(){
  const tm = 3000;
  const tm2 = 800;
  const spinner = document.getElementById('loading');
  // 1秒かけてロゴを非表示にし、その後0.8秒かけて背景を非表示にする
  $('#loading').fadeOut(tm, function(){
    $('#loading').fadeOut(tm2);
  });
}


  </script>
    <div id="app">
<header>
  <div class="header">
    <p>familylog</p>
  </div>
</header>
        <main class="py-4">
            @yield('content')
        </main>

    @guest
    @else
    <footer>
    <div class="">
        <div id="footer">
          <ul>
            <li><a href="{{ route('home') }}"><i class="fas fa-images"></i><label >アルバム</label></a></li>
            @if( request()->url() === route('home') )
            <li><a href="">
              <!--現在のurlとコントローラーパラメーターを判定-->
              <i class="fas fa-image"></i><label for="file">選択</label>
              <form action="{{ route('image_up') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
              <input type="hidden" name="user_id" value="Auth::user()->id" style="display: none;">
              </form>
              </a>
            </li>
            @endif
            @if( request()->url() === route('home') )
          <li>
            <a href="">
          <!--現在のurlとコントローラーパラメーターを判定-->
            <i class="fas fa-folder-plus"></i><label for="submit">追加</label>
            </a>
            <form action="{{ route('image_up') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="file" name="file" id="file" value="{{ old('file') }}" style="display: none;">

            <input type="submit" id="submit" style="display: none;">
            </form>
          </li>
            @endif
            <li>
              <a href="{{ route('family' , Auth::user()->id ) }}"><i class="fas fa-user-cog"></i>家族構成</a>
            </li>
            <li>
              <a class="" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i>logout</a></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </ul>
        </div>
    </div>
  </footer>
  @endguest
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <!--<script src="{{ asset('/js/calendar.js') }}" charset="utf-8" type="text/javascript"></script>-->
  <!--<script src="{{ asset('/js/demo.js') }}" charset="utf-8" type="text/javascript"></script>-->
  </div>
</body>
</html>
