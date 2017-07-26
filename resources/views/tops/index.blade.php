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

@if ( count($influence_users) > 0 )
<div class="col-md-8 col-md-offset-2 notification-box">
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
        @include('modules.boxes.ranking', [
            'section_title' => 'ドラマ部門',
            'items' => $scenario_ranks,
            'more_link' => '/scenarios?category=drama',
        ])
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        @include('modules.boxes.ranking', [
            'section_title' => '映画部門',
            'items' => $scenario_ranks,
            'more_link' => '/scenarios?category=movie',
        ])
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        @include('modules.boxes.ranking', [
            'section_title' => 'ネット配信部門',
            'items' => $scenario_ranks,
            'more_link' => '/scenarios?category=internet',
        ])
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php /* invisible bar for keeping the line space */ ?>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        @include('modules.boxes.latest', [
            'section_title' => '新着',
            'items' => $scenario_ranks,
            'more_link' => '/scenarios',
        ])
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        @include('modules.boxes.category', [
            'section_title' => 'ジャンル',
            'items' => $categories,
        ])
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <p>審査通過作品</p>
        <a href="/scenarios?prize=fujiyang">
            <li class="recent-post">
                <span>
                    フジテレビヤングシナリオ大賞
                </span>
            </li>
        </a>
        <hr>
        <a href="/scenarios?prize=tvasashi">
            <li class="recent-post">
                <span>
                    テレビ朝日シナリオ大賞
                </span>
            </li>
        </a>
        <hr>
        <a href="/scenarios?prize=tbsdrama">
            <li class="recent-post">
                <span>
                    TBSドラマシナリオ大賞
                </span>
            </li>
        </a>
        <hr>
        <a href="/scenarios?prize=kido">
            <li class="recent-post">
                <span>
                    城戸賞
                </span>
            </li>
        </a>
        <hr>
        <a href="/scenarios?prize=anather">
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
