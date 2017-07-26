<div class="nav nav-header container">
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
                <div>
                    <button type="button" class="btn btn-primary" name="button">脚本を登録する</button>
                </div>
                <div>
                    <button type="button" class="btn btn-success" name="button">会員登録</button>
                </div>
                <div>
                    <button type="button" class="btn btn-success" name="button">ログイン</button>
                </div>
                <!-- @if (Auth::guest())
                <div>
                    会員登録
                </div>
                <div>
                    ログイン
                </div>
                @else
                <div>
                    ぴよぴお
                </div>
                @endif -->
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
