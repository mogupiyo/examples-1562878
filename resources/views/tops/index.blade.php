@extends('layouts.app')

@section('content')
<div class="container menu-container">
    <div class="row">
        <div class="menu-box table">
            <a href="#">
                <div class="col-lg-4">
                    <p>作者の方へ</p>
                </div>
            </a>
            <a href="#">
                <div class="col-lg-4">
                    <p>読者の方へ</p>
                </div>
            </a>
            <a href="#">
                <div class="col-lg-4">
                    <p>TV・映画関係者の方へ</p>
                </div>
            </a>
        </div>
        <div class="rank-title table">
            <div class="col-lg-12">
                <p>月間アクセスランキング</p>
            </div>
        </div>
        <div class="rank-category table">
            <div class="col-lg-4">
                <p>ドラマ部門</p>
            </div>
            <div class="col-lg-4">
                <p>映画部門</p>
            </div>
            <div class="col-lg-4">
                <p>ネット配信部門</p>
            </div>
        </div>
        <div class="rank-box table">
            <div class="col-lg-4">
                @foreach ($scenario_ranks as $data)
                <a href="/show/{{ $data->id }}">
                    <li class="recent-post">
                        <span>
                            {{ $loop->index + 1 }}位 {{ $data->title }} <span class="small">(作:{{ $data->name }})</span>
                        </span>
                    </li>
                </a>
                <hr style="margin: 0;">
                @endforeach
            </div>
            <div class="col-lg-4">
                @foreach ($scenario_ranks as $data)
                <a href="/show/{{ $data->id }}">
                    <li class="recent-post">
                        <span>
                            {{ $loop->index + 1 }}位 {{ $data->title }} <span class="small">(作:{{ $data->name }})</span>
                        </span>
                    </li>
                </a>
                <hr style="margin: 0;">
                @endforeach
            </div>
            <div class="col-lg-4">
                @foreach ($scenario_ranks as $data)
                <a href="/show/{{ $data->id }}">
                    <li class="recent-post">
                        <span>
                            {{ $loop->index + 1 }}位 {{ $data->title }} <span class="small">(作:{{ $data->name }})</span>
                        </span>
                    </li>
                </a>
                <hr style="margin: 0;">
                @endforeach
            </div>
        </div>
        <div class="">
            <div class="col-lg-12">
            </div>
        </div>
        <div class="rank-category table">
            <div class="col-lg-4">
                <p>新着</p>
            </div>
            <div class="col-lg-4">
                <p>ジャンル</p>
            </div>
            <div class="col-lg-4">
                <p>審査通過作品</p>
            </div>
        </div>
        <div class="rank-box table">
            <div class="col-lg-4">
                @foreach ($scenario_ranks as $data)
                <a href="/show/{{ $data->id }}">
                    <li class="recent-post">
                        <span>
                            {{ date("m/d", strtotime($data->created_at)) }} {{ $data->title }} <span class="small">(作:{{ $data->name }})</span>
                        </span>
                    </li>
                </a>
                <hr style="margin: 0;">
                @endforeach
            </div>
            <div class="col-lg-4 category-pane">
                <div class="category-left">
                    <a href="#">
                        <li class="recent-post">
                            <span>
                                恋愛
                            </span>
                        </li>
                    </a>
                    <hr style="margin: 0;">
                    <a href="#">
                        <li class="recent-post">
                            <span>
                                コメディ
                            </span>
                        </li>
                    </a>
                    <hr style="margin: 0;">
                    <a href="#">
                        <li class="recent-post">
                            <span>
                                時代
                            </span>
                        </li>
                    </a>
                    <hr style="margin: 0;">
                    <a href="#">
                        <li class="recent-post">
                            <span>
                                ヒューマンドラマ
                            </span>
                        </li>
                    </a>
                    <hr style="margin: 0;">
                    <a href="#">
                        <li class="recent-post">
                            <span>
                                推理サスペンス
                            </span>
                        </li>
                    </a>
                    <hr style="margin: 0;">
                </div>
                <div class="category-right">
                    <a href="#">
                        <li class="recent-post">
                            <span>
                                SF・ファンタジー
                            </span>
                        </li>
                    </a>
                    <hr style="margin: 0;">
                    <a href="#">
                        <li class="recent-post">
                            <span>
                                ホラー
                            </span>
                        </li>
                    </a>
                    <hr style="margin: 0;">
                    <!-- <a href="#">
                        <li class="recent-post">
                            <span>
                            </span>
                        </li>
                    </a>
                    <hr style="margin: 0;">
                    <a href="#">
                        <li class="recent-post">
                            <span>
                            </span>
                        </li>
                    </a>
                    <hr style="margin: 0;">
                    <a href="#">
                        <li class="recent-post">
                            <span>
                            </span>
                        </li>
                    </a>
                    <hr style="margin: 0;"> -->
                </div>
            </div>
            <div class="col-lg-4">
                <a href="#">
                    <li class="recent-post">
                        <span>
                            フジテレビヤングシナリオ大賞
                        </span>
                    </li>
                </a>
                <hr style="margin: 0;">
                <a href="#">
                    <li class="recent-post">
                        <span>
                            テレビ朝日シナリオ大賞
                        </span>
                    </li>
                </a>
                <hr style="margin: 0;">
                <a href="#">
                    <li class="recent-post">
                        <span>
                            TBSドラマシナリオ大賞
                        </span>
                    </li>
                </a>
                <hr style="margin: 0;">
                <a href="#">
                    <li class="recent-post">
                        <span>
                            城戸賞
                        </span>
                    </li>
                </a>
                <hr style="margin: 0;">
                <a href="#">
                    <li class="recent-post">
                        <span>
                            その他
                        </span>
                    </li>
                </a>
                <hr style="margin: 0;">
            </div>
        </div>
        <div class="">
            <div class="col-lg-12">
            </div>
        </div>
        <div class="ad-box">
            <div class="col-lg-4">
                @include('modules.advertise.banner')
            </div>
            <div class="col-lg-4">
                @include('modules.advertise.banner')
            </div>
            <div class="col-lg-4">
                @include('modules.advertise.banner')
            </div>
        </div>
        <!-- <div class="footer-margin">
            <div class="col-lg-12">
            </div>
        </div> -->
        <div class="follow-box table">
            <div class="col-lg-12">
                <p>フォローするをここに設置？</p>
            </div>
        </div>
        @include('modules.footer')
    </div>
</div>
@endsection
