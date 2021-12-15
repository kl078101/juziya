<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', '句子鸭') - 好多句子鸭</title>

    {{-- css 文件 --}}
    <link rel="stylesheet" type="text/css" href="{{asset('style/style.css')}}">

    {{-- bootstrap CDN --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


  </head>
  <body>

    {{-- 引入导航 --}}
    @include('layouts._header')

    <div class="container">
      <div class="offset-md-1 col-md-10">
        {{-- 引入提示 --}}
        @include('shared._messages')

        @yield('content')
        {{-- 引入底部 --}}
        @include('layouts._footer')

      </div>
    </div>

  </body>
</html>
