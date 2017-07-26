@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="show-story">
            <h2 class="title-widget-scenario">{{ $story->scene }}  {{ $story->topic }}</h2>
            <div class="">
                {!! nl2br($story->episode) !!}
            </div>
            <div class="comment-box">
                <div>
                    <h2 class="title-widget-scenario">コメント</h2>
                    <ul>
                        @foreach ( $story->comments as $comment )
                        <li>
                            <div>
                                {!! nl2br($comment->data) !!}
                            </div>
                            <div>
                                @include('modules.badges.user', [ 'item' => $comment->name ])
                                @include('modules.badges.date', [ 'item' => $comment->created_at ])
                            </div>
                        </li>
                        @endforeach
                        @if (count($story->comments) === 0)
                        <li>
                            <div>
                                まだコメントが投稿されていません。
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
                @if (Auth::guest())
                <div class="text-danger">
                    <h3>コメントをするには会員登録・ログインが必要です。</h3>
                    <a href="/login">
                        <button type="button" class="btn btn-success" name="button">ログインする</button>
                    </a>
                </div>
                @else
                <div>
                    <form action="/comments/{{ $story->id }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                            <textarea name="comment" rows="8" placeholder="コメントを入力" required></textarea>
                            @if ($errors->has('comment'))
                            <span class="help-block">
                                <strong>コメントが入力されていません。</strong>
                            </span>
                            @endif
                            <button type="submit" class="btn btn-success" name="button">コメントする</button>
                        </div>
                    </form>
                </div>
                @endif
            </div>
            <div>
                <a href="/scenarios/{{ $scenario->id }}">
                    <button type="button" class="btn btn-primary">戻る</button>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
