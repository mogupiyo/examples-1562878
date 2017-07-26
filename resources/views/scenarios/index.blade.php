@extends('layouts.app')

@section('content')
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 list-scenarios">
		<h2 class="title-widget-scenario">投稿作品一覧</h2>
		{{ $scenarios->links() }}
		<ul class="list-group outer" style="margin-top: 10px;">
			@foreach ($scenarios as $data)
			<li class="list-group-item">
				<a href="/scenarios/{{ $data->id }}">
					<div class="">
						<div class="">
							<i class="glyphicon glyphicon-film"></i> <label for="scenario-title">{{ $data->title }}</label>
						</div>
						<span class="text-description" style="color: #555;">{{ $data->description }}</span>
					</div>
				</a>
				<div class="badge-box">
			        @include('modules.badges.date', [ 'item' => $data->created_at ])
			        @include('modules.badges.cate', [ 'item' => $data->label ])
			        @include('modules.badges.view', [ 'item' => rand(5, 1000) ])
			        @include('modules.badges.star', [ 'item' => rand(5, 1000) ])
			        @include('modules.badges.user', [ 'item' => $data->name ])
				</div>
			</li>
			@if ( (($loop->index + 1) % 4) === 0 && ($loop->index + 1) < 20)
			<li class="list-group-item" style="padding:10px;">
				<!-- @include('modules.advertise.ad_inview_article') -->
				<!-- <img src="/storage/banner-sample.jpg" style="width: 100%;" alt=""> -->
				ここに広告ここに広告ここに広告ここに広告ここに広告
			</li>
			@endif
			@endforeach
		</ul>
		{{ $scenarios->links() }}
		<!-- <div class="ad-box">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				@include('modules.advertise.ad_inview_article')
			</div>
		</div> -->
</div>

@include('modules.right_box')

@endsection
