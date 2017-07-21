<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>

    <div id="wrap">
        <nav class="navbar navbar-inverse">
            <div class="container">
                @include('modules.header')
            </div>
        </nav>

        <div id="contents" class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
        <div id="footer">
            <div class="container">
                <div class="row">
                    @include('modules.footer')
                </div>
            </div>
        </div>
    </div>



    <script src="/js/app.js"></script>

</body>
</html>
