@extends('admin.layouts.cms')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Users
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Config::get('app.admin.prefix') }}/dashboard"><i class="fa fa-dashboard"></i> Console</a></li>
        <li class="active">Users</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

</section>
<!-- /.content -->

@endsection
