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
           <button class="btn btn-default filter-button" data-filter="love">恋愛</button>
           <button class="btn btn-default filter-button" data-filter="fantasy">ファンタジー</button>
           <button class="btn btn-default filter-button" data-filter="horror">ホラー</button>
           <button class="btn btn-default filter-button" data-filter="mistery">ミステリー</button>
           <button class="btn btn-default filter-button" data-filter="light-nodel">ライトノベル</button>
           <button class="btn btn-default filter-button" data-filter="non-fiction">ノンフィクション</button>
       </div>
       <br/>



           <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter love">
               <!-- <img src="http://fakeimg.pl/365x365/" class="img-responsive"> -->
               たとえばテキスト
           </div>

           <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter fantasy">
               <img src="http://fakeimg.pl/365x365/" class="img-responsive">
           </div>

           <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter horror">
               <img src="http://fakeimg.pl/365x365/" class="img-responsive">
           </div>

           <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter mistery">
               <img src="http://fakeimg.pl/365x365/" class="img-responsive">
           </div>

           <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter light-nodel">
               <img src="http://fakeimg.pl/365x365/" class="img-responsive">
           </div>

           <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter non-fiction">
               <img src="http://fakeimg.pl/365x365/" class="img-responsive">
           </div>

           <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter non-fiction">
               <img src="http://fakeimg.pl/365x365/" class="img-responsive">
           </div>

           <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter mistery">
               <img src="http://fakeimg.pl/365x365/" class="img-responsive">
           </div>

           <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter horror">
               <img src="http://fakeimg.pl/365x365/" class="img-responsive">
           </div>

           <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter love">
               <img src="http://fakeimg.pl/365x365/" class="img-responsive">
           </div>

           <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter love">
               <img src="http://fakeimg.pl/365x365/" class="img-responsive">
           </div>

           <div class="gallery_product col-lg-3 col-md-3 col-sm-3 col-xs-6 filter fantasy">
               <img src="http://fakeimg.pl/365x365/" class="img-responsive">
           </div>
       </div>
   </div>
</section>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
