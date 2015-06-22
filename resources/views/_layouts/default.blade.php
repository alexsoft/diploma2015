<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('page_title', 'Chat')</title>

    @section('css')
        <link href='http://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    @show

</head>
<body>

    @include('_partials.navbar')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @include('_partials.errors')
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @yield('content')
            </div>
        </div>
    </div>

    @section('js')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    @show
</body>
</html>