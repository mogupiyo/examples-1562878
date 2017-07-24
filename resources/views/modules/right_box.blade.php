<!--           // RECENT POST===========-->
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <!-- <div class="widget-sidebar" style="padding: 0;">
        <a href="/mypage/scenarios/create">
            <div class="content-widget-sidebar">
                <button class="btn btn-primary" type="button" name="button" style="width: 100%;">＋ 作品を投稿する</button>
            </div>
        </a>
    </div> -->
    <div class="widget-sidebar" style="margin-top: 0;">
        <h2 class="title-widget-sidebar">ランキング</h2>
        <div class="content-widget-sidebar">
            <ul class="list-group outer">
                @foreach ($scenario_ranks as $data)
                <li class="list-group-item" style="padding:0;">
                    <ul class="list-group inner">
                        <li class="list-group-item">
                            <a href="/scenarios/{{ $data->id }}">{{ $loop->index + 1 }}位 {{ $data->title }}</a>
                        </li>
                        <li class="list-group-item" style="min-height: 42px;">
                            <span class="badge">{{ date("m/d", strtotime($data->created_at)) }}</span>
                            <span class="badge">作: {{ $data->name }}</span>
                        </li>
                    </ul>
                </li>
                <hr>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- <div class="ad-sidebar">
        @include('modules.advertise.ad_inview_article')
    </div> -->

    <div class="widget-sidebar">
        <h2 class="title-widget-sidebar">殿堂入り</h2>
        <div class="content-widget-sidebar">
            <ul class="list-group outer">
                @foreach ($scenario_ranks as $data)
                <li class="list-group-item" style="padding:0;">
                    <ul class="list-group inner">
                        <li class="list-group-item">
                            <a href="/scenarios/{{ $data->id }}">{{ $data->title }}</a>
                        </li>
                        <li class="list-group-item" style="min-height: 42px;">
                            <span class="badge">{{ date("m/d", strtotime($data->created_at)) }}</span>
                            <span class="badge">作: {{ $data->name }}</span>
                        </li>
                    </ul>
                </li>
                <hr>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- <div class="ad-sidebar">
        @include('modules.advertise.banner')
    </div> -->

    <!--=====================
    CATEGORIES
    ======================-->
    <!-- <div class="widget-sidebar">
        <h2 class="title-widget-sidebar">カテゴリ一覧</h2>
        <div class="content-widget-sidebar">
            <ul style="padding: 0;">
                @foreach ($categories as $data)
                <li class="recent-post">
                    <a href="/scenarios?category={{ $data->path }}">{{ $data->label }}</a>
                </li>
                <hr>
                @endforeach
            </ul>
        </div>
    </div> -->

    <!--=====================
    NEWSLATTER
    ======================-->
    <!-- <div class="widget-sidebar">
        <h2 class="title-widget-sidebar">ニュースを受け取る</h2>
        <p>お知らせをメールで受け取る場合など</p>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
            <input id="email" type="text" class="form-control" name="email" placeholder="Email">
        </div>
        <button type="button" class="btn btn-warning">送る</button>
    </div> -->


</div>
