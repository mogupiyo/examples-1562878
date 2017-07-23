@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ユーザー情報編集</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/mypage/upload"  enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">お名前</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">メールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="メールアドレスを入力" class="form-control" name="email" value="{{ Auth::user()->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">性別</label>

                            <div class="col-md-6">
                                <select class="form-control" name="gender">
                                    <option value="">選択</option>
                                    @if (Auth::user()->gender === 0)
                                    <option value="0" selected>男性</option>
                                    <option value="1">女性</option>
                                    @elseif (Auth::user()->gender === 1)
                                    <option value="0">男性</option>
                                    <option value="1" selected>女性</option>
                                    @else
                                    <option value="0">男性</option>
                                    <option value="1">女性</option>
                                    @endif
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                            <label for="birthday" class="col-md-4 control-label">生年月日</label>

                            <div class="col-md-6">
                                @if (Auth::user()->birthday)
                                <input id="birthday" type="date" class="form-control" name="birthday" value="{{ Auth::user()->birthday }}" required>
                                @else
                                <input id="birthday" type="date" class="form-control" name="birthday" value="{{ date('Y-m-d') }}" required>
                                @endif

                                @if ($errors->has('birthday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">アイコン画像</label>

                            <div class="col-md-6">
                                <!-- <input id="password" type="password" class="form-control" name="picture" required> -->
                                <input type="file" name="file" class="form-control">

                                @if ($errors->has('file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
