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
            <h3><span class="text-default">新しい作品を投稿する</span></h3>
            <hr>
            <form method="POST" action="/mypage/scenarios" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group required {{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1" class='control-label'>タイトル</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="例）日の目を見たい脚本家の憂鬱">
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group required {{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="descTextarea" class='control-label'>概要</label>
                    <textarea class="form-control" name="description" id="descTextarea" placeholder="例）とある脚本家がとあるサイトに出会うことで夢を叶える物語" rows="2"></textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group required {{ $errors->has('category_id') ? ' has-error' : '' }}">
                    <label for="exampleCatetory" class='control-label'>カテゴリ</label>
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $data)
                        <option value="{{ $data->id }}">{{ $data->label }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputFile" name="thumbnail">サムネイル</label>
                    <input type="file" name="file" class="form-control">
                </div>
                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn btn-primary">
                            投稿する
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col col-md-2"></div>

    </div>
</div>
@endsection
