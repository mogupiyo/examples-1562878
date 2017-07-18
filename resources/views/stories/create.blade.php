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
        <h4>新しいストーリーを追加する</h4>
        <div class="col col-md-2"></div>
        <div class="col col-md-8">
            <form method="POST" action="/mypage/scenarios/{{ $id }}/story" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ $errors->first('title') }}
                {{ $errors->first('category_id') }}
                {{ $errors->first('description') }}
                {{ $errors->first('file') }}
                {{ $errors->first('content') }}
                <div class="form-group required">
                    <label for="exampleInputEmail1" class='control-label'>話数</label>
                    <input type="text" name="scene" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="例）第１話">
                    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                </div>
                <div class="form-group required">
                    <label for="descTextarea" class='control-label'>タイトル</label>
                    <input type="text" name="topic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="例）冒険の始まり">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile" name="thumbnail">サムネイル</label>
                    <input type="file" name="file" class="form-control">
                </div>
                <div class="form-group required">
                    <label for="contentTextarea" class='control-label'>本文</label>
                    <textarea class="form-control" name="episode" id="contentTextarea" rows="7"></textarea>
                </div>
                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn btn-primary">
                            追加する
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col col-md-2"></div>

    </div>
</div>
@endsection
