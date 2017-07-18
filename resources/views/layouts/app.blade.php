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


    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="https://lh3.googleusercontent.com/-N4NB2F966TU/WM7V1KYusRI/AAAAAAAADtA/fPvGVNzOkCo7ZMqLI6pPITE9ZF7NONmawCJoC/w185-h40-p-rw/logo.png"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">ご案内<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">初めての方へ</a></li>
                            <li><a href="#">作者の方へ</a></li>
                            <li><a href="#">読者の方へ</a></li>
                        </ul>
                    </li>
                    <li><a href="#">公式ブログ</a></li>
                    <li><a href="#">質問板</a></li>
                    <li><a href="#">ランキング</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <form class="navbar-form navbar-left">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <span>検索</span>
                                </button>
                            </div>
                        </div>
                    </form>
                    @if (Auth::guest())
                        <li><a href="/register"><span class=""></span>会員登録</a></li>
                        <li><a href="/login"><span class=""></span>ログイン</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/mypage/scenarios/create') }}">脚本を投稿する</a>
                                </li>
                                <li>
                                    <a href="{{ url('/mypage/scenarios') }}">自分の投稿</a>
                                </li>
                                <li>
                                    <a href="{{ url('/mypage/user') }}">プロフィール</a>
                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        ログアウト
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
