@extends('admin.layouts.cms')

@section('content')
<style media="screen">
/*    --------------------------------------------------
	:: General
	-------------------------------------------------- */
body {
	font-family: 'Open Sans', sans-serif;
	color: #353535;
}
.content h1 {
	text-align: center;
}
.content .content-footer p {
	color: #6d6d6d;
    font-size: 12px;
    text-align: center;
}
.content .content-footer p a {
	color: inherit;
	font-weight: bold;
}

/*	--------------------------------------------------
	:: Table Filter
	-------------------------------------------------- */
.panel {
	border: 1px solid #ddd;
	background-color: #fcfcfc;
}
.panel .btn-group {
	margin: 15px 0 30px;
}
.panel .btn-group .btn {
	transition: background-color .3s ease;
}
.table-filter {
	background-color: #fff;
	border-bottom: 1px solid #eee;
}
.table-filter tbody tr:hover {
	cursor: pointer;
	background-color: #eee;
}
.table-filter tbody tr td {
	padding: 10px;
	vertical-align: middle;
	border-top-color: #eee;
}
.table-filter tbody tr.selected td {
	background-color: #eee;
}
.table-filter tr td:first-child {
	width: 38px;
}
.table-filter tr td:nth-child(2) {
	width: 35px;
}
.ckbox {
	position: relative;
}
.ckbox input[type="checkbox"] {
	opacity: 0;
}
.ckbox label {
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}
.ckbox label:before {
	content: '';
	top: 1px;
	left: 0;
	width: 18px;
	height: 18px;
	display: block;
	position: absolute;
	border-radius: 2px;
	border: 1px solid #bbb;
	background-color: #fff;
}
.ckbox input[type="checkbox"]:checked + label:before {
	border-color: #2BBCDE;
	background-color: #2BBCDE;
}
.ckbox input[type="checkbox"]:checked + label:after {
	top: 3px;
	left: 3.5px;
	content: '\e013';
	color: #fff;
	font-size: 11px;
	font-family: 'Glyphicons Halflings';
	position: absolute;
}
.table-filter .star {
	color: #ccc;
	text-align: center;
	display: block;
}
.table-filter .star.star-checked {
	color: #F0AD4E;
}
.table-filter .star:hover {
	color: #ccc;
}
.table-filter .star.star-checked:hover {
	color: #F0AD4E;
}
.table-filter .media-photo {
	width: 100px;
    height: 100px;
}
.table-filter .media-body {
    display: block;
    /* Had to use this style to force the div to expand (wasn't necessary with my bootstrap version 3.3.6) */
}
.table-filter .media-meta {
	font-size: 11px;
	color: #999;
}
.table-filter .media .title {
	color: #2BBCDE;
	font-size: 14px;
	font-weight: bold;
	line-height: normal;
	margin: 0;
}
.table-filter .media .title span {
	font-size: .8em;
	margin-right: 20px;
}
.table-filter .media .title span.pagado {
	color: #5cb85c;
}
.table-filter .media .title span.pendiente {
	color: #f0ad4e;
}
.table-filter .media .title span.cancelado {
	color: #d9534f;
}
.table-filter .media .summary {
	font-size: 14px;
}
.btn-default.btn-on-3.active{color: #5BB75B;font-weight:bolder;}
.btn-default.btn-off-3.active{color: #DA4F49;font-weight:bolder;}
</style>

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
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger btn-filter" data-target="related">未承認</button>
                            <button type="button" class="btn btn-success btn-filter" data-target="approved">承認済み</button>
                            <button type="button" class="btn btn-default btn-filter" data-target="normal">一般ユーザー</button>
                            <button type="button" class="btn btn-primary btn-filter" data-target="all">すべて</button>
                        </div>
                    </div>
                    <div class="table-container">
                        <table class="table table-filter">
                            <thead>
                                <tr>
                                    <td style="width: 10%;">アイコン</td>
                                    <td style="width: 40%; padding-left: 22px;">名前</td>
                                    <td style="width: 10%;" class="text-center">種別</td>
                                    <td style="width: 10%;" class="text-center">権限</td>
                                    <td style="width: 10%;" class="text-center">承認</td>
                                    <td style="width: 20%;" class="text-center">登録日</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $users as $data )
                                @if ( $data->film_related === 1 )
                                    @if ($data->approved === 1)
                                <tr data-status="approved">
                                    @else
                                <tr data-status="related">
                                    @endif
                                @else
                                <tr data-status="normal">
                                @endif
                                    <td>
                                        @if ($data->avatar)
                                        <img src="/storage/avatar/{{ $data->avatar }}" class="media-photo">
                                        @else
                                        <img src="/storage/avatar/no-image.jpg" class="media-photo">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            {{ $data->name }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="small text-center">
                                            @if ( $data->film_related !== 0 )
                                            映画・TV関係者
                                            @else
                                            一般ユーザー
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="small text-center">
                                            {{ $data->roll }}
                                        </div>
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <div class="btn-group">
                                            @if ( $data->approved === 1 )
                                            <button type="button" class="btn btn-success" name="button" disabled="disabled">承認済み</button>
                                            @else
                                                @if ( $data->film_related === 1 )
                                            <form class="form-group" action="{{ Config::get('app.admin.prefix') }}/users/{{ $data->id }}" method="POST" style="margin: 0;">
                                                <input name="_method" type="hidden" value="PUT">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger" name="button">承認待ち</button>
                                            </form>
                                                @else
                                            <button type="button" class="btn btn-default" name="button" disabled="disabled">対象外</button>
                                                @endif
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="media">
                                            {{ date("Y-m-d", strtotime($data->created_at)) }}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {

    $('.star').on('click', function () {
        $(this).toggleClass('star-checked');
    });

    $('.ckbox label').on('click', function () {
        $(this).parents('tr').toggleClass('selected');
    });

    $('.btn-filter').on('click', function () {
        var $target = $(this).data('target');
        if ($target != 'all') {
            $('.table tr').css('display', 'none');
            $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
        } else {
            $('.table tr').css('display', 'none').fadeIn('slow');
        }
    });

});
</script>

@endsection
