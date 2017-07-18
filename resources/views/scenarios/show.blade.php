@extends('layouts.app')

@section('content')
<style>
.form-group.required .control-label:after {
   content:"*";
   color:red;
}
</style>

<div class="container">
    <div class="row">
        <div class="col col-md-2"></div>
        <div class="col col-md-8">
            <div class="form-group">
                <p><img src="/storage/thumbnail/{{ $scenario->thumbnail }}" style="width: 100%;"></p>
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
            <div class="form-group required">
                <label for="contentTextarea" class='control-label'>本文</label>
                <p>{{ $scenario->content }}</p>
            </div>
            <div class="form-group">
                <a href="/mypage/scenarios/{{ $scenario->id }}/edit">
                    <button type="button" class="btn btn-primary">
                        編集する
                    </button>
                </a>
            </div>
        </div>
        <div class="col col-md-2"></div>

    </div>
</div>
@endsection
