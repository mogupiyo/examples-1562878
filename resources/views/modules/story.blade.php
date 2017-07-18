<div class="form-group">
    <p><img class="cover" src="/storage/stories/{{ $story->thumbnail }}" style="width: 100%;"></p>
</div>
<div class="form-group">
    <a href="#">
        <span>TOP</span>
    </a>
     >
    <a href="#">
        <span>{{ $scenario->title }}</span>
    </a>
     >
     <span>{{ $story->scene }} {{ $story->topic }}</span>
</div>
<div class="form-group">
    <h1>{{ $story->scene }}  {{ $story->topic }}</h1>
</div>
<div class="form-group" style="margin: 60px 0;">
    <p>{{ nl2br($story->episode) }}</p>
</div>
<div class="form-group">
    <a href="/show/{{ $scenario->id }}">
        <button type="button" class="btn btn-primary">
            戻る
        </button>
    </a>
</div>
