@extends('layouts.app')

@section('content')
@include('modules.modals.modal')
<div class="login-space">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- Invisible Bar For Adjust Indent. -->
    </div>
</div>
<div class="col-md-8 col-md-offset-2 login-box">
    <div class="panel panel-default">
        <div class="panel-heading">会員登録用のURLをメールで送信します。</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/tempregist') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <!-- <label for="email" class="col-md-4 control-label">メールアドレス</label> -->

                    <div class="col-md-6 col-md-offset-3">
                        <input id="email" type="email" placeholder="メールアドレスを入力" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">
                            送信する
                        </button>
                        <a class="btn btn-link" href="{{ url('/login') }}">
                            すでにアカウントをお持ちですか？
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@include('modules.social.login')
@endsection
