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
        <h4>新しい脚本を投稿する</h4>
        <div class="col col-md-2"></div>
        <div class="col col-md-8">
            <form method="POST" action="/mypage/scenarios/{{ $scenario->id }}/edit" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group required">
                    {{ $errors->first('title') }}
                    <label for="exampleInputEmail1" class='control-label'>タイトル</label>
                    <input type="text" name="title" value="{{ $scenario->title }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="例）日の目を見たい脚本家の憂鬱">
                </div>
                <div class="form-group required">
                    {{ $errors->first('description') }}
                    <label for="descTextarea" class='control-label'>概要</label>
                    <textarea class="form-control" name="description" id="descTextarea" placeholder="例）とある脚本家がとあるサイトに出会うことで夢を叶える物語" rows="2">
{{ $scenario->description }}
                    </textarea>
                </div>
                <div class="form-group required">
                    {{ $errors->first('category_id') }}
                    <label for="exampleCatetory" class='control-label'>カテゴリ</label>
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $data)
                        <option value="{{ $data->id }}" <?php echo ($data->id === $scenario->category_id) ? "selected" : "" ; ?>>{{ $data->label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {{ $errors->first('file') }}
                    <label for="exampleInputFile" name="thumbnail">サムネイル</label>
                    <input type="file" name="file" class="form-control">
                </div>
                <div class="form-group required">
                    {{ $errors->first('content') }}
                    <label for="contentTextarea" class='control-label'>本文</label>
                    <textarea class="form-control" name="content" id="contentTextarea" rows="7">
{{ $scenario->content }}
                    </textarea>
                </div>
                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn btn-primary">
                            編集する
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col col-md-2"></div>

    </div>
</div>
@endsection
