<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/storage/avatar/{{ Auth::user()->avatar }}" class="" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="{{ Config::get('app.admin.prefix') }}">
                    <i class="fa fa-dashboard"></i> <span>ダッシュボード</span>
                </a>
            </li>
            <li class="">
                <a href="{{ Config::get('app.admin.prefix') }}/users">
                    <i class="fa fa-dashboard"></i> <span>ユーザー</span>
                </a>
            </li>
            <li class="">
                <a href="{{ Config::get('app.admin.prefix') }}/categories">
                    <i class="fa fa-dashboard"></i> <span>カテゴリ</span>
                </a>
            </li>
            <li class="">
                <a href="{{ Config::get('app.admin.prefix') }}/pages">
                    <i class="fa fa-dashboard"></i> <span>フッター</span>
                </a>
            </li>
            <li class="">
                <a href="{{ Config::get('app.admin.prefix') }}/mails">
                    <i class="fa fa-envelope"></i> <span>メール</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
