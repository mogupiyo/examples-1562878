@extends('admin.layouts.cms')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Categories
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Config::get('app.admin.prefix') }}/dashboard"><i class="fa fa-dashboard"></i> Console</a></li>
        <li class="active">Categories</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-container">
                        <table class="table table-filter">
                            <thead>
                                <tr>
                                    <td class="col-md-5">
                                        カテゴリ名
                                    </td>
                                    <td class="col-md-5">
                                        英表記
                                    </td>
                                    <td class="col-md-1" style="text-align: center;">
                                        編集
                                    </td>
                                    <td class="col-md-1" style="text-align: center; width 100%;">
                                        削除
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $categories as $data )
                                <tr>
                                    <td class="col-md-5">
                                        {{ $data->label }}
                                    </td>
                                    <td class="col-md-5">
                                        {{ $data->path }}
                                    </td>
                                    <td class="col-md-1" style="text-align: center;">
                                        <a href="{{ Config::get('app.admin.prefix') }}/categories/{{ $data->id }}/edit">
                                            <button type="button" class="btn btn-success" name="button">編集</button>
                                        </a>
                                    </td>
                                    <td class="col-md-1" style="text-align: center; width 100%;">
                                        <button type="button" id="modal-button" class="btn btn-danger" data-toggle="modal" data-target="#modal-{{ $data->id }}">削除</button>
                                    </td>
                                </tr>
                                <form method="POST" action="{{ Config::get('app.admin.prefix') }}/categories/{{ $data->id }}" accept-charset="UTF-8" id="xxx" class="form-horizontal">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="modal fade" id="modal-{{ $data->id }}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">元に戻せません。削除してよろしいですか?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-danger">削除する</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <a href="{{ Config::get('app.admin.prefix') }}/categories/create">
                <button type="submit" class="btn btn-primary" name="button">カテゴリを追加</button>
            </a>
        </div>

    </div>
</section>
<!-- /.content -->

@endsection
