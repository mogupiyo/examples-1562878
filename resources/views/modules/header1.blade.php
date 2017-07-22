<div class="row header-navi">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nav-left">
        <p class="site-catch">脚本投稿サイト</p>
        <p class="site-title">THE BLACK LIST</p>
        <!-- <img src="/img/sample_logo.png" alt=""> -->
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 nav-right">
        <!-- <div class="container">
            <div class="row">
            </div>
        </div> -->
        <div class="col-md-12 menu-control" style="padding: 0;">
            <div id="search-box" class="col-md-6 col-md-offset-2" style="padding: 0;">
                <form class="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn" style="padding: 0;">
                            <button class="btn btn-success" type="submit">
                                <span>検索</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2 auth-button">
                <label for="" style="border: 1px solid #fff;">会員登録</label>
            </div>
            <div class="col-md-2 auth-button" style="text-align: left;">
                <label for="" style="border: 1px solid #fff;">ログイン</label>
            </div>
        </div>
        <div id="post-scenario" class="col-md-6 col-md-offset-2">
            <button type="button" class="btn btn-primary col-md-10" name="button">
                脚本を投稿する
            </button>
        </div>
        <!-- <ul class="nav navbar-nav navbar-right">
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
            <li><a href="/tempregist"><span class="">会員登録</span></a></li>
            <li><a href="/login"><span class="">ログイン</span></a></li>
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
    </div> -->
    <!-- <div class="left">
        <p class="site-catch">脚本投稿サイト</p>
        <p class="site-title">THE BLACK LIST</p>
    </div>
    <div class="right">
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
    </div> -->
</div>
