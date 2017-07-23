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
                        <form class="form-group" action="{{ Config::get('app.admin.prefix') }}/categories/{{ $category->id }}" method="POST">
                            <input name="_method" type="hidden" value="PUT">
                            {{ csrf_field() }}

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
                                        </td>
                                        <td class="col-md-1" style="text-align: center; width 100%;">
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col-md-5">
                                            <input type="text" name="label" placeholder="例）恋愛" value="{{ $category->label }}" required>
                                        </td>
                                        <td class="col-md-5">
                                            <input type="text" name="path" placeholder="例）love" value="{{ $category->path }}" required>
                                        </td>
                                        <td class="col-md-1" style="text-align: center;">
                                            <button type="submit" class="btn btn-success" name="button">変更</button>
                                        </td>
                                        <form class="form-group" action="{{ Config::get('app.admin.prefix') }}/categories/{{ $category->id }}/edit" method="PUT">
                                            <td class="col-md-1" style="text-align: center; width 100%;">
                                                <button type="button" id="modal-button" class="btn btn-danger" data-toggle="modal" data-target="#modal-{{ $category->id }}">削除</button>
                                            </td>
                                        </form>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <form method="POST" action="{{ Config::get('app.admin.prefix') }}/categories/{{ $category->id }}" accept-charset="UTF-8" id="xxx" class="form-horizontal">
                            <input name="_method" type="hidden" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="modal fade" id="modal-{{ $category->id }}">
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
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- /.content -->

@endsection
