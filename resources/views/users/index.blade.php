@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ユーザー情報</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="GET" action="/mypage/user/{{ Auth::user()->id }}/edit">

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">お名前</label>
                            <div class="col-md-6">
                                <div class="text-left" style="padding-top: 8px;">{{ Auth::user()->name }}</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">メールアドレス</label>
                            <div class="col-md-6">
                                <div class="text-left" style="padding-top: 6px;">{{ Auth::user()->email }}</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">性別</label>
                            <div class="col-md-6">
                                @if (Auth::user()->gender === 0)
                                <div class="text-left" style="padding-top: 6px;">男性</div>
                                @elseif (Auth::user()->gender === 1)
                                <div class="text-left" style="padding-top: 6px;">女性</div>
                                @else
                                <div class="text-left" style="padding-top: 6px;">未設定</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">生年月日</label>
                            <div class="col-md-6">
                                @if (Auth::user()->birthday)
                                <div class="text-left" style="padding-top: 6px;">{{ date("Y年m月d日", strtotime(Auth::user()->birthday)) }}</div>
                                @else
                                <div class="text-left" style="padding-top: 6px;">未設定</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">イメージアイコン</label>
                            <div class="col-md-6" style="padding-top: 12px;">
                                <div class="text-left" style="width: 200px; height: 200px;">
                                    @if (Auth::user()->avatar)
                                        <img src="/storage/avatar/{{ Auth::user()->avatar }}" alt="avatar" style="width: 100%; height: 100%;">
                                    @else
                                        <img src="/storage/avator/no-image.jpg" alt="avatar" style="width: 100%; height: 100%;">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    編集
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
