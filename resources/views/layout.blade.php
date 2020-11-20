<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <title>@yield('title')</title>
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
        <base href="{{url('/')}}"   />
    </head>
  <body>

    @include('menu')
        <main class="container">
            @yield('main')
        </main><!-- /.container -->
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}" ></script>
    </body>
</html>