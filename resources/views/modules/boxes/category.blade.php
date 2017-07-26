<p style="margin: 30px 0 20px 0;">{{ $section_title }}</p>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding: 0 4px;">
    <ul style="padding: 0;">
        @foreach ( $items as $data )
        @if ( ($loop->index) % 2 === 0)
        <li style="padding:0;">
            <a href="/scenarios?category={{ $data->path }}">
                <div class="category">
                    <span>{{ $data->label }}</span>
                </div>
            </a>
        </li>
        @endif
        @endforeach
    </ul>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding: 0 4px;">
    <ul style="padding: 0;">
        @foreach ( $items as $data )
        @if ( ($loop->index) % 2 !== 0)
        <li style="padding:0;">
            <a href="/scenarios?category={{ $data->path }}">
                <div class="category">
                    <span>{{ $data->label }}</span>
                </div>
            </a>
        </li>
        @endif
        @endforeach
    </ul>
</div>
@if (isset($more_link))
<a href="{{ $more_link }}">
    <li>
        ...もっとみる
    </li>
</a>
@endif
