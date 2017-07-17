@extends('layouts.app')

@section('content')
<style>
.gallery-title
{
    font-size: 36px;
    color: #42B32F;
    text-align: center;
    font-weight: 500;
    margin-bottom: 40px;
}
.gallery-title:after {
    content: "";
    position: absolute;
    width: 7.5%;
    left: 46.5%;
    height: 45px;
}
.filter-button
{
    font-size: 18px;
    border: 1px solid #42B32F;
    border-radius: 5px;
    text-align: center;
    color: #42B32F;
    margin-bottom: 30px;

}
.filter-button:hover
{
    font-size: 18px;
    border: 1px solid #42B32F;
    border-radius: 5px;
    text-align: center;
    color: #ffffff;
    background-color: #42B32F;

}
.btn-default:active .filter-button:active
{
    background-color: #42B32F;
    color: white;
}

.port-image
{
    width: 100%;
}

.gallery_product
{
    margin-bottom: 30px;
}

ul.sample {
    margin:0 0 10px;
    display:-webkit-box;
    display:-moz-box;
    display:-ms-box;
    display:-webkit-flexbox;
    display:-moz-flexbox;
    display:-ms-flexbox;
    display:-webkit-flex;
    display:-moz-flex;
    display:-ms-flex;
    display:flex;
    -webkit-box-lines:multiple;
    -moz-box-lines:multiple;
    -webkit-flex-wrap:wrap;
    -moz-flex-wrap:wrap;
    -ms-flex-wrap:wrap;
    flex-wrap:wrap;
    width:100%;
}

ul.sample li {
    margin:0 10px 10px 0;
    padding:10px;
    border:1px solid #aaa;
    width:250px;
    background: rgba(0,0,0,0.5);
    list-style:none;
}
.grid-title {
    color: white;
    margin: 10px 0;
}
.grid-description {
    color: white;
    margin: 5px 0;
}

</style>
<!--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
-->

    <div class="container">
        <div class="row">
            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="gallery-title">みんなの作品一覧</h1>
            </div>

            <div align="center">
                <button class="btn btn-default filter-button" data-filter="all">すべて</button>
                @foreach($categories as $data)
                <button class="btn btn-default filter-button" data-filter="{{ $data->path }}">{{ $data->label }}</button>
                @endforeach
            </div>
            <br/>



<?php /* ?>
            <div>
                <ul class="sample">
                @foreach($scenarios as $data)
                    <li class="filter {{ $data->path }}">
                        <div class="">
                            <img src="/storage/thumbnail/{{ $data->thumbnail }}" class="img-responsive">
                        </div>
                        <div class="grid-title">
                            {{ $data->title }}
                        </div>
                        <div class="grid-description">
                            {{ $data->description }}
                        </div>
                    </li>
                @endforeach
                </ul>
            </div>
<?php */ ?>


<?php /* ?>
<?php */ ?>
            @foreach($scenarios as $data)
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 filter {{ $data->path }}">
                <div class="" style="width: 100%;">
                    <div class="">
                        <img src="/storage/thumbnail/{{ $data->thumbnail }}" class="img-responsive" style="width: 100%;">
                        <div class="" style="padding: 10px; background: rgba(0,0,0,0.7); color: white;">
                            {{ $data->title }}
                        </div>
                        <div class="" style="padding: 10px; background: rgba(0,0,0,0.7); color: white;">
                            {{ $data->description }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>
$(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');

        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');

        }
    });

    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});
</script>

@endsection
