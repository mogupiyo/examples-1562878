@extends('layouts.app')

@section('content')
<div class="login-space">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- Invisible Bar For Adjust Indent. -->
    </div>
</div>
<div class="col-md-8 col-md-offset-2 login-box">
    <div class="panel panel-default">
        <div class="panel-heading">ログイン</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">メールアドレス</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">パスワード</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            ログイン
                        </button>

                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
                            パスワードをお忘れですか？
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-8 col-md-offset-2">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <br>
        <hr>
        <br>
    </div>
</div>
<div class="col-md-8 col-md-offset-2 btn-twitter">
    <a href="#">
        <p>Twitterでログイン</p>
    </a>
</div>
<div class="col-md-8 col-md-offset-2 btn-line">
    <a href="#">
        <p>LINEでログイン</p>
    </a>
</div>
<div class="col-md-8 col-md-offset-2">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <br>
        <br>
        <br>
    </div>
</div>
@endsection
