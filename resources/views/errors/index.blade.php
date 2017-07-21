
@extends('layouts.app')

@section('content')
<div class="error-space">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- Invisible Bar For Adjust Indent. -->
    </div>
</div>
<div class="col-md-8 col-md-offset-2 error-box">
    <label for="error-title"><h3>エラー</h3></label>
    <div class="title">申し訳ございません。アプリケーションエラーが発生しました。</div>
    @if (Session::get('errorcd'))
    <div class="title">エラー内容を確認し、管理者に問い合わせてください。</div>
    <div class="title">エラーコード: {{ Session::get('errorcd') }}</div>
    <div class="title">エラー内容: {{ Session::get('errormsg') }}</div>
    @else
    <div class="title">お手数ですが、管理者に問い合わせてください。</div>
    @endif
</div>
@endsection
