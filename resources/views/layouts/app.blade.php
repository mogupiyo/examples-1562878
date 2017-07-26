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
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet" />

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
        <header>
            <div id="header-area" class="header-area container">
                @include('modules.header')
            </div>
        </header>

        <div id="contents" class="container">
            <div class="row">
                @yield('content')
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 100px;">
                    <?php /* invisible bar for keeping the line space */ ?>
                </div>
            </div>
        </div>

        <footer>
            <div class="container">
                @include('modules.footer')
            </div>
        </footer>
    </div>

    <!-- <script src="/js/app.js"></script> -->

</body>
</html>
