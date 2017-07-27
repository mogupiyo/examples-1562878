@extends('layouts.app')

@section('content')
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

    <h2 class="title-widget-scenario">{{ $scenario->title }}</h2>
    <div>
        {{ $scenario->description }}
    </div>
    <div style="padding: 10px 0;">
        @include('modules.badges.user', [ 'item' => $scenario->name ])
        @include('modules.badges.view', [ 'item' => (count($scenario->dailyview) + $scenario->totalview['count']) ])
        @include('modules.badges.star', [ 'item' => rand(5, 1000) ])
        @include('modules.badges.date', [ 'item' => $scenario->created_at ])
    </div>
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
        <!-- <div class="story-box">
            <div class="story-scene title-text">
                <span>{{ $data->scene }}</span>
            </div>
            <div class="story-topic">
                {{ $data->topic }}
            </div>
            <div class="story-control">
                <a href="/show/{{ $scenario->id }}/story/{{ $data->id }}">
                    <button type="button" class="btn btn-success">
                        読む
                    </button>
                </a>
            </div>
        </div> -->
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
