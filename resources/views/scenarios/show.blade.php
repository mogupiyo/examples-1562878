@extends('layouts.app')

@section('content')
<style media="screen">
.bookmark-box {
    margin-top: 10px;
}
.bookmark-box:hover .mask {
    display: block;
    opacity: 1;
}
.mask {
    display: none;
    opacity: 0;
    color: #A94442;
    margin-top: 10px;
    background-color: #F2DEDE;
    padding: 10px;
    position: relative;
}
.mask a {
    color: #A94442;
    text-decoration: underline;
}
</style>
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

    <h2 class="title-widget-scenario">{{ $scenario->title }}</h2>
    <div>
        {{ $scenario->description }}
    </div>
    <div style="padding: 10px 0;">
        @include('modules.badges.user', [ 'item' => $scenario->name ])
        @include('modules.badges.view', [ 'item' => ($scenario->dailyview->count() + $scenario->totalview['count']) ])
        @include('modules.badges.star', [ 'item' => $scenario->bookmarks->count() ])
        @include('modules.badges.date', [ 'item' => $scenario->created_at ])
    </div>
    @if (!Auth::guest())
    <div class="bookmark-box">
        @if ($scenario->mybookmarks->first())
        <form class="form-group" action="/mypage/bookmarks/{{ $scenario->id }}" method="post">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-danger" name="button">
                <i class="glyphicon glyphicon-check"></i>
                <i class="glyphicon glyphicon-book"></i>
                本棚から削除
            </button>
        </form>
        @else
        <form class="form-group" action="/mypage/bookmarks" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="scenario_id" value="{{ $scenario->id }}">
            <button type="submit" class="btn btn-success" name="button">
                <i class="glyphicon glyphicon-book"></i>
                本棚に追加する
            </button>
        </form>
        @endif
    </div>
    @else
    <div class="bookmark-box">
        <form class="form-group" action="/mypage/bookmarks" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="scenario_id" value="{{ $scenario->id }}">
            <button type="submit" class="btn btn-default" name="button" disabled="disabled">
                <i class="glyphicon glyphicon-book"></i>
                本棚に追加する
            </button>
            <div class="mask">
                <span class="">本棚のご利用には <a href="/login">ログイン</a> が必要です。</span>
            </div>
        </form>
    </div>
    @endif
    <h2 class="title-widget-scenario">ストーリー</h2>
    <div class="form-group">
        @foreach ($stories as $data)
        <ul class="list-group outer">
                <li class="list-group-item">
                    <a href="/scenarios/{{ $scenario->id }}/story/{{ $data->id }}">
                        <div class="">
                            <span>{{ $data->scene }}</span>
                            <span>{{ $data->topic }}</span>
                        </div>
                    </a>
                    <div class="" style="padding: 5px 0;">
                        @include('modules.badges.date', [ 'item' => $data->created_at ])
                        @include('modules.badges.view', [ 'item' => (count($data->dailyview) + $data->totalview['count']) ])
                    </div>
                </li>
        </ul>
        @endforeach
        @if (count($stories) === 0)
        <div class="serch-message-area" style="margin: 10px 0 20px 0; border-bottom: 1px solid rgba(0,0,0,0.3); border-top: 1px solid rgba(0,0,0,0.3);">
            <h4 class="title text-success">「{{ $scenario->name }}」さんが最初のストーリーを執筆中です！お楽しみに！</h4>
        </div>
        @endif
    </div>
    <div class="form-group">
        <a href="/">
            <button type="button" class="btn btn-primary">
                戻る
            </button>
        </a>
    </div>

</div>

@include('modules.right_box')

@endsection
