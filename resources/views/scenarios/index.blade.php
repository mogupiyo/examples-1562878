@extends('layouts.app')

@section('content')
@include('modules.layouts.styles.right')
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 list-scenarios">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-primary">
			<div class="panel-heading">投稿作品一覧</div>
			<div class="panel-body">
				{{ $scenarios->links() }}
				<ul class="list-group outer" style="margin-top: 10px;">
					@foreach ($scenarios as $data)
					<li class="list-group-item" style="padding:0;">
						<ul class="list-group inner">
							<li class="list-group-item">
								<a href="#">{{ $data->title }}</a><br>
								<span>{{ $data->description }}</span>
							</li>
							<li class="list-group-item" style="min-height: 42px;">
								<span class="badge">{{ date("m/d", strtotime($data->created_at)) }}</span>
								<span class="badge">作: {{ $data->name }}</span>
								<span class="badge">{{ $data->label }}</span>
								<span class="badge">14</span>
							</li>
						</ul>
					</li>
					@if ( (($loop->index + 1) % 4) === 0 && ($loop->index + 1) < 20)
					<li class="list-group-item" style="padding:10px;">
						<!-- @include('modules.advertise.ad_inview_article') -->
						<img src="/storage/sample-banner.png" style="width: 100%;" alt="">
					</li>
					@endif
					@endforeach
				</ul>
				{{ $scenarios->links() }}
			</div>
		</div>
		<!-- <div class="ad-box">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				@include('modules.advertise.ad_inview_article')
			</div>
		</div> -->
	</div>
	<!-- <div class="ranking">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<p>ジャンル</p>
			<div class="category-left">
				@foreach ( $categories as $data )
				<a href="#">
					<li class="recent-post">
						<span>
							{{ $data->label }}
						</span>
					</li>
				</a>
				<hr>
				@endforeach
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<p>審査通過作品</p>
			<a href="#">
				<li class="recent-post">
					<span>
						フジテレビヤングシナリオ大賞
					</span>
				</li>
			</a>
			<hr>
			<a href="#">
				<li class="recent-post">
					<span>
						テレビ朝日シナリオ大賞
					</span>
				</li>
			</a>
			<hr>
			<a href="#">
				<li class="recent-post">
					<span>
						TBSドラマシナリオ大賞
					</span>
				</li>
			</a>
			<hr>
			<a href="#">
				<li class="recent-post">
					<span>
						城戸賞
					</span>
				</li>
			</a>
			<hr>
			<a href="#">
				<li class="recent-post">
					<span>
						その他
					</span>
				</li>
			</a>
			<hr>
		</div>
	</div> -->
</div>

@include('modules.right_box')

@endsection
