@extends('layouts.app')

@section('content')
<style>
.form-group.required .control-label:after {
   content:"*";
   color:red;
}
.story-box {
    display: table;
    width: 100%;
    margin: 10px 0;
}
.story-box div {
    display: table-cell;
    padding: 10px;
    border: none;
    border-bottom: 1px solid rgba(0,0,0,0.3);
}
.story-box div.story-scene {
    width: 10%;
    min-width: 75px;
    /*text-align: center;*/
}
.story-box div.story-thumbnail {
    width: 20%;
}
.story-box div.story-thumbnail img {
    width: 100%;
    max-height: 100px;
    object-fit: cover;
}
.story-box div.story-topic {
    width: 50%;
}
.story-box div.story-control {
    width: 20%;
}
.footer-control {
    padding: 20px 0;
    text-align: right;
}
.title-text {
    display: block;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    text-align: left;
}
.cover {
    width: 100px;
    height: 250px;
    object-fit: cover;
}
</style>

<div class="container">
    <div class="row">
        <div class="col col-md-2"></div>
        <div class="col col-md-8">
            <div class="form-group">
                <p><img class="cover" src="/storage/thumbnail/{{ $scenario->thumbnail }}" style="width: 100%;"></p>
            </div>
            <div class="form-group">
                {{ $errors->first('title') }}
                <label for="exampleInputEmail1" class='control-label'>タイトル</label>
                <p>{{ $scenario->title }}</p>
            </div>
            <div class="form-group">
                <label for="descTextarea" class='control-label'>概要</label>
                <p>{{ $scenario->description }}</p>
            </div>
            <div class="form-group">
                <label for="exampleCategory" class='control-label'>カテゴリ</label>
                <p>{{ $scenario->label }}</p>
            </div>
            <div class="form-group">
                <label for="contentTextarea" class='control-label'>ストーリー</label>
                @foreach ($stories as $data)
                <div class="story-box">
                    <div class="story-scene">
                        <span>{{ $data->scene }}</span>
                    </div>
                    <div class="story-thumbnail">
                        <span><img src="/storage/stories/{{ $data->thumbnail }}" alt="{{ $data->scene }}{{ $data->topic }}"></span>
                    </div>
                    <div class="story-topic">
                        {{ $data->topic }}
                    </div>
                    <div class="story-control">
                        <a href="/mypage/scenarios/{{ $scenario->id }}/story/{{ $data->id }}/edit">
                            <button type="button" class="btn btn-success">
                                編集
                            </button>
                        </a>
                        <button type="button" id="modal-button" class="btn btn-danger" data-toggle="modal" data-target="#modal-{{ $data->id }}">削除</button>
                    </div>
                </div>
                <form method="POST" action="/mypage/scenarios/{{ $scenario->id }}/story/{{ $data->id }}/" accept-charset="UTF-8" id="xxx" class="form-horizontal">
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="modal fade" id="modal-{{ $data->id }}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">元に戻せません。削除してよろしいですか?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger">削除する</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @endforeach
                @if (count($stories) === 0)
                <div class="serch-message-area">
                    <h4 class="title text-danger">ストーリーはまだ投稿されていません。</h4>
                    <p class="text-danger">「ストーリーを追加する」から初めの１話を登録しましょう！</p>
                </div>
                @endif
            </div>
            <div class="form-group footer-control">
                <a href="/mypage/scenarios/{{ $scenario->id }}/story/create">
                    <button type="button" class="btn btn-primary">
                        ストーリーを追加する
                    </button>
                </a>
                <a href="/mypage/scenarios/{{ $scenario->id }}/edit">
                    <button type="button" class="btn btn-success">
                        作品を編集する
                    </button>
                </a>
            </div>
        </div>
        <div class="col col-md-2"></div>

    </div>
</div>
@endsection
