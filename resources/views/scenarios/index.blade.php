@extends('layouts.app')

@section('content')
<style>
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
	width: 50px;
}
.table-filter tr td:nth-child(2) {
	width: 35px;
}
.table-filter tr td div img {
	width: 100%;
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
	width: 35px;
}
.table-filter .media-body {
    display: block;
    width: 100%;
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
</style>
<div class="container">
	<div class="row">

		<section class="content">
			<h1>投稿した作品</h1>
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default btn-filter" data-target="love">恋愛</button>
								<button type="button" class="btn btn-default btn-filter" data-target="fantasy">ファンタジー</button>
								<button type="button" class="btn btn-default btn-filter" data-target="horror">ホラー</button>
								<button type="button" class="btn btn-default btn-filter" data-target="mistery">ミステリー</button>
								<button type="button" class="btn btn-default btn-filter" data-target="light-nodel">ライトノベル</button>
								<button type="button" class="btn btn-default btn-filter" data-target="non-fiction">ノンフィクション</button>
								<button type="button" class="btn btn-default btn-filter" data-target="all">すべて</button>
							</div>
						</div>
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
                                    @foreach ($scenarios as $data)
									<tr data-status="{{ $data->path }}">
										<td style="width: 10%;">
											<div class="ckbox">
												@if ($data->thumbnail)
													<img src="/storage/thumbnail/{{ $data->thumbnail }}" class="media-photo" style="width: 100%;">
												@else
													<img src="/storage/avator/no-image.jpg" class="media-photo" style="width: 100%;">
												@endif
											</div>
										</td>
										<td style="width: 0%; padding: 0;">
											<div class="ckbox">
                                                <input type="checkbox" id="checkbox{{ $data->id }}">
                                                <!-- <label for="checkbox{{ $data->id }}"></label> -->
											</div>
										</td>
										<td style="width: 90%;">
											<div class="media">
												<div class="media-body">
													<span class="media-meta pull-right">{{ $data->created_at }}</span>
													<h4 class="title">
														<a href="/mypage/scenarios/{{ $data->id }}/edit">{{ $data->title }}</a>
														<span class="pull-right text-muted">{{ $data->label }}</span>
													</h4>
													<p class="summary">{{ $data->description }}</p>
												</div>
												<div class="media-control" style="text-align: right;">
													<a href="/mypage/scenarios/{{ $data->id }}" style="color: white;">
														<div class="btn btn-primary">
															詳細を見る
														</div>
													</a>
													<a href="/mypage/scenarios/{{ $data->id }}/edit" style="color: white;">
														<div class="btn btn-success">
															編集する
														</div>
													</a>
													<button type="button" id="modal-button" class="btn btn-danger" data-toggle="modal" data-target="#modal-example">削除</button>
												</div>
											</div>
										</td>
									</tr>
						            <form method="POST" action="/mypage/scenarios/{{ $data->id }}" accept-charset="UTF-8" id="xxx" class="form-horizontal">
						                <input name="_method" type="hidden" value="DELETE">
						                <input type="hidden" name="_token" value="{{ csrf_token() }}">

						                <div class="modal fade" id="modal-example">
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
				<div class="content-footer">
					<p>
						Sample © - 2017 <br>
						Powered By <a href="http://naseba.mogupiyo.net" target="_blank">NasebaApps</a>
					</p>
				</div>
			</div>
		</section>

	</div>
</div>
<script>
$(document).ready(function () {

	$('.star').on('click', function () {
      $(this).toggleClass('star-checked');
    });

    $('.ckbox label').on('click', function () {
      $(this).parents('tr').toggleClass('selected');
    });

    $('.btn-filter').on('click', function () {
    //   $('.btn').removeClass('btn-success');
    //   $('.btn').addClass('btn-default');
    //   $(this).removeClass('btn-default');
    //   $(this).addClass('btn-success');
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
