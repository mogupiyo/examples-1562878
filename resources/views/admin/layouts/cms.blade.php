<!DOCTYPE html>
<html>
<head>
    @include('admin.modules.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
        @include('admin.modules.header')
        @include('admin.modules.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('admin.modules.ctl-sidebar')
        @include('admin.modules.footer')
    </div>

    @include('admin.modules.scripts')

</body>
</html>
