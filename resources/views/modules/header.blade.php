<div class="nav nav-header">
    <div class="over">
        <div class="left">
            <div>
                <div class="app-name">
                    <!-- <p class="site-title"><a href="/">{{ Config::get('app.name') }}</a></p> -->
                    <a href="/">
                        <img src="/img/site_banner_lg.png" alt="" style="width: 100%; height: 100%;">
                    </a>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="search">
                <form method="GET" action="/scenarios">
                    <input type="text" name="keyword" class="form-control" placeholder="タイトル or 説明 or 作者で検索">
                </form>
            </div>
            <div class="login-control">
                @if (Auth::guest())
                <div>
                    <button type="button" class="btn btn-primary" name="button">脚本を登録する</button>
                </div>
                <div>
                    <button type="button" class="btn btn-success" name="button">会員登録</button>
                </div>
                <div>
                    <button type="button" class="btn btn-success" name="button">ログイン</button>
                </div>
                @else
                <div style="flex: 2;">
                    <button type="button" class="btn btn-primary" name="button">脚本を登録する</button>
                </div>
                <div id="auth-control" style="display: flex; justify-content: center; align-items: center; padding-top: 5px;">
                    <ul id="login-control" class="text-center">
                        <li class="dropdown">
                            <a id="login-name-box" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu" style="color: #000 !important;">
                                <li>
                                    <a href="{{ url('/mypage/scenarios/create') }}" style="color: #000 !important;">脚本を投稿する</a>
                                </li>
                                <li>
                                    <a href="{{ url('/mypage/scenarios') }}" style="color: #000 !important;">自分の投稿</a>
                                </li>
                                <li>
                                    <a href="{{ url('/mypage/user') }}" style="color: #000 !important;">プロフィール</a>
                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #000 !important;">ログアウト</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="under">
        <div class="film-border-content">
            <div>
                <p><a href="#">作者の方へ</a></p>
            </div>
            <div>
                <p><a href="#">読者の方へ</a></p>
            </div>
            <div>
                <p><a href="#">TV・映画<br>関係者の方へ</a></p>
            </div>
        </div>
        <div style="background-color: #000;">
            <div></div>
        </div>
    </div>
</div>
