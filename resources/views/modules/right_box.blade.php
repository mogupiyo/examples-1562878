<!--           // RECENT POST===========-->
<div class="col-lg-4">
    <div class="widget-sidebar">
        <h2 class="title-widget-sidebar">ランキング</h2>
        <div class="content-widget-sidebar">
            <ul style="padding: 0;">
                @foreach ($scenario_ranks as $data)
                <li class="recent-post">
                    <div class="post-img">
                        <img class="cover" src="/storage/thumbnail/{{ $data->thumbnail }}" class="img-responsive">
                    </div>
                    <a href="#"><h5>{{ $data->title }}</h5></a>
                    <p style="margin: 0;"><small>{{ $data->name }}</small></p>
                    <p><small>{{ $data->created_at }}</small></p>
                </li>
                <hr>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="widget-sidebar">
        <h2 class="title-widget-sidebar">殿堂入り</h2>
        <div class="content-widget-sidebar">
            <ul style="padding: 0;">
                @foreach ($scenario_ranks as $data)
                <li class="recent-post">
                    <div class="post-img">
                        <img class="cover" src="/storage/thumbnail/{{ $data->thumbnail }}" class="img-responsive">
                    </div>
                    <a href="#"><h5>{{ $data->title }}</h5></a>
                    <p style="margin: 0;"><small>{{ $data->name }}</small></p>
                    <p><small>{{ $data->created_at }}</small></p>
                </li>
                <hr>
                @endforeach
            </ul>
        </div>
        <!-- <div class="last-post">
            <button class="accordion">21/4/2016</button>
            <div class="panel">
                <li class="recent-post">
                    <div class="post-img">
                        <img src="https://lh3.googleusercontent.com/-13DR8P0-AN4/WM1ZIz1lRNI/AAAAAAAADeo/XMfJ7CM-pQg9qfRuCgSnphzqhaj3SQg6QCJoC/w424-h318-n-rw/thumbnail4.jpg" class="img-responsive">
                    </div>
                    <a href="#"><h5>Excepteur sint occaecat cupi non proident laborum.</h5></a>
                    <p><small><i class="fa fa-calendar" data-original-title="" title=""></i> 30 Juni 2014</small></p>
                </li>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.   Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
        <hr>
        <div class="last-post">
            <button class="accordion">5/7/2016</button>
            <div class="panel">
                <li class="recent-post">
                    <div class="post-img">
                        <img src="https://lh3.googleusercontent.com/-QlnwuVgbxus/WM1ZI1FKQiI/AAAAAAAADeo/nGSd1ExnnfIfIBF27xs8-EdBdfglqFPZgCJoC/w424-h318-n-rw/thumbnail2.jpg" class="img-responsive">
                    </div>
                    <a href="#"><h5>Excepteur sint occaecat cupi non proident laborum.</h5></a>
                    <p><small><i class="fa fa-calendar" data-original-title="" title=""></i> 30 Juni 2014</small></p>
                </li>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.   Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
        <hr>
        <div class="last-post">
            <button class="accordion">15/9/2016</button>
            <div class="panel">
                <li class="recent-post">
                    <div class="post-img">
                        <img src="https://lh3.googleusercontent.com/-wRHL_FOH1AU/WM1ZIxQZ3DI/AAAAAAAADeo/lwJr8xndbW4MHI-lOB7CQ-14FJB5f5SWACJoC/w424-h318-n-rw/thumbnail5.jpg" class="img-responsive">
                    </div>
                    <a href="#"><h5>Excepteur sint occaecat cupi non proident laborum.</h5></a>
                    <p><small><i class="fa fa-calendar" data-original-title="" title=""></i> 30 Juni 2014</small></p>
                </li>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.   Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
        <hr>
        <div class="last-post">
            <button class="accordion">2/3/2017</button>
            <div class="panel">
                <li class="recent-post">
                    <div class="post-img">
                        <img src="https://lh3.googleusercontent.com/-QlnwuVgbxus/WM1ZI1FKQiI/AAAAAAAADeo/nGSd1ExnnfIfIBF27xs8-EdBdfglqFPZgCJoC/w424-h318-n-rw/thumbnail2.jpg" class="img-responsive">
                    </div>
                    <a href="#"><h5>Excepteur sint occaecat cupi non proident laborum.</h5></a>
                    <p><small><i class="fa fa-calendar" data-original-title="" title=""></i> 30 Juni 2014</small></p>
                </li>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.   Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div> -->
    </div>

    <!--=====================
    CATEGORIES
    ======================-->
    <div class="widget-sidebar">
        <h2 class="title-widget-sidebar">カテゴリ別</h2>
        @foreach ($categories as $data)
        <button class="categories-btn">{{ $data->label }}</button>
        @endforeach
    </div>

    <!--=====================
    NEWSLATTER
    ======================-->
    <div class="widget-sidebar">
        <h2 class="title-widget-sidebar">ニュースを受け取る</h2>
        <p>お知らせをメールで受け取る場合など</p>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
            <input id="email" type="text" class="form-control" name="email" placeholder="Email">
        </div>
        <button type="button" class="btn btn-warning">送る</button>
    </div>


</div>
