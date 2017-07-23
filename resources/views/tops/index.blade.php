@extends('layouts.app')

@section('content')
@if (Session::get('LoginID') != '')
    <?php /* ↓↓ ここのコメントアウトは重要です ↓↓ */ ?>
    <!-- {{ Auth::loginUsingId(Session::get('LoginID')) }} -->
    <?php /* ↑↑ ここのコメントアウトは重要です ↑↑ */ ?>
    @if (Session::get('NewRegistFlg'))
        @include('modules.modals.confirm_film_related')
    @endif
@endif
<!-- <div class="menu-box table">
    <a href="#">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <p>作者の方へ</p>
        </div>
    </a>
    <a href="#">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <p>読者の方へ</p>
        </div>
    </a>
    <a href="#">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <p>TV・映画<br>関係者の方へ</p>
        </div>
    </a>
</div> -->
<!-- <div class="hang-navi">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <p>作者の方へ</p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <p>読者の方へ</p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <p>TV・映画<br>関係者の方へ</p>
    </div>
</div> -->
@if ( count($influence_users) > 0 )
<!-- <div class="special-notify table">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p class="col-md-12">お知らせ 映画・TV関係者の方が会員登録をしました！</p>
        @foreach ($influence_users as $data)
        <p>{{ $data->name }} <span class="small">さん</span></p>
        @endforeach
    </div>
</div> -->
<div class="col-md-8 col-md-offset-2 login-box">
    <div class="panel panel-info">
        <div class="panel-heading">お知らせ</div>
        <div class="panel-body">
            映画・TV関係者の方が会員登録をしました！
        </div>
        <ul class="list-group">
            @foreach ($influence_users as $data)
            <li class="list-group-item">{{ $data->name }} <span class="small">さん</span></li>
            @endforeach
        </ul>
    </div>
</div>
@endif
<div class="rank-title table">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p>月間アクセスランキング</p>
    </div>
</div>
<div class="ranking">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <p>ドラマ部門</p>
        @foreach ($scenario_ranks as $data)
        <a href="/show/{{ $data->id }}">
            <li class="recent-post">
                <span>
                    {{ $loop->index + 1 }}位 {{ $data->title }} <span class="small">(作:{{ $data->name }})</span>
                </span>
            </li>
        </a>
        <hr>
        @endforeach
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <p>映画部門</p>
        @foreach ($scenario_ranks as $data)
        <a href="/show/{{ $data->id }}">
            <li class="recent-post">
                <span>
                    {{ $loop->index + 1 }}位 {{ $data->title }} <span class="small">(作:{{ $data->name }})</span>
                </span>
            </li>
        </a>
        <hr>
        @endforeach
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <p>ネット配信部門</p>
        @foreach ($scenario_ranks as $data)
        <a href="/show/{{ $data->id }}">
            <li class="recent-post">
                <span>
                    {{ $loop->index + 1 }}位 {{ $data->title }} <span class="small">(作:{{ $data->name }})</span>
                </span>
            </li>
        </a>
        <hr>
        @endforeach
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <p>新着</p>
        @foreach ($scenario_ranks as $data)
        <a href="/show/{{ $data->id }}">
            <li class="recent-post">
                <span>
                    {{ date("m/d", strtotime($data->created_at)) }} {{ $data->title }} <span class="small">(作:{{ $data->name }})</span>
                </span>
            </li>
        </a>
        <hr>
        @endforeach
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <p>ジャンル</p>
        <div class="category-left">
            @foreach ( $categories as $data )
            <a href="#">
                <li class="recent-post">
                    <span>
                        {{ $data->label }}
                    </span>
                </li>
            </a>
            <hr>
            @endforeach
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <p>審査通過作品</p>
        <a href="#">
            <li class="recent-post">
                <span>
                    フジテレビヤングシナリオ大賞
                </span>
            </li>
        </a>
        <hr>
        <a href="#">
            <li class="recent-post">
                <span>
                    テレビ朝日シナリオ大賞
                </span>
            </li>
        </a>
        <hr>
        <a href="#">
            <li class="recent-post">
                <span>
                    TBSドラマシナリオ大賞
                </span>
            </li>
        </a>
        <hr>
        <a href="#">
            <li class="recent-post">
                <span>
                    城戸賞
                </span>
            </li>
        </a>
        <hr>
        <a href="#">
            <li class="recent-post">
                <span>
                    その他
                </span>
            </li>
        </a>
        <hr>
    </div>
</div>
<div class="">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- Invisible Bar For Adjust Indent. -->
    </div>
</div>
<!-- <div class="ad-box">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        @include('modules.advertise.banner')
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        @include('modules.advertise.banner')
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        @include('modules.advertise.banner')
    </div>
</div> -->
<!-- <div class="footer-margin">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    </div>
</div> -->
<div class="follow-box table">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <p>フォローするをここに設置？</p>
    </div>
</div>
<!-- @include('modules.footer') -->
@endsection
