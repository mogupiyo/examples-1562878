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

        <form class="form-group" action="{{ Config::get('app.admin.prefix') }}/categories" method="POST">
            {{ csrf_field() }}
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
                                        </td>
                                        <td class="col-md-1" style="text-align: center; width 100%;">
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col-md-5">
                                            <input type="text" name="label" placeholder="例）恋愛" value="{{ old('label') }}" required>
                                        </td>
                                        <td class="col-md-5">
                                            <input type="text" name="path" placeholder="例）love" value="{{ old('path') }}" required>
                                        </td>
                                        <td class="col-md-1" style="text-align: center;">
                                        </td>
                                        <td class="col-md-1" style="text-align: center; width 100%;">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="button">追加</button>
            </div>
        </form>

    </div>
</section>
<!-- /.content -->

@endsection
