@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div>
            <div>
                @include('modules.story', ['story' => $story, 'scenario' => $scenario])
            </div>
        </div>
    </div>
</section>
@endsection
