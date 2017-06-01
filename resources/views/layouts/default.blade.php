<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Sample App') - Laravel 入门教程</title>
    <link rel="stylesheet" href="/css/app.css?a={{ time() }}">
  </head>
  <body>
    @include('layouts._header')
    <div class="container">
      @yield('content')
    </div>
    @include('layouts._footer')
  </body>
</html>
