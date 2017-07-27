<p>{{ $section_title }}</p>
@foreach ($items as $data)
<ul style="padding: 0;">
    <li class="recent-post" style="padding: 0;">
        <a href="/scenarios/{{ $data->id }}">
            <div class="rank-scenario-title">
                <span>{{ date("m/d", strtotime($data->created_at)) }} {{ $data->title }}</span>
            </div>
        </a>
        <div class="text-right border-bottom">
            @include('modules.badges.view', [ 'item' => (count($data->dailyview) + $data->totalview['count']) ])
            @include('modules.badges.user', [ 'item' => $data->name ])
        </div>
    </li>
</ul>
@endforeach
@if (isset($more_link))
<a href="{{ $more_link }}">
    <li class="recent-post">
        ...もっとみる
    </li>
</a>
@endif
