@extends('layouts.app')

@section('content')
<style>
.form-group.required .control-label:after {
    content:"*";
    color:red;
}
.btn-default {
    color: #333;
    background-color: #009688;
    border-color: #009688;
    border-radius:0px;
    color:#fff;
}

#blog-section{margin-top:40px;margin-bottom:80px;}
.content-title{padding:5px;background-color:#fff;}
.content-title h3 a{color:#34495E;text-decoration:none; transition: 0.5s;}
.content-title h3 a:hover{color:#F39C12; }
.content-footer{background-color:#16A085;padding:10px;position: relative;}
.content-footer span a {
    color: #fff;
    display: inline-block;
    padding: 6px 5px;
    text-decoration: none;
    transition: 0.5s;
}
.content-footer span a:hover{
    color:#F39C12;
}
aside{
    margin-top: 30px;
    -webkit-box-shadow: 1px 4px 16px 3px rgba(199,197,199,1);
-moz-box-shadow: 1px 4px 16px 3px rgba(199,197,199,1);
box-shadow: 1px 4px 16px 3px rgba(199,197,199,1);}
aside .content-footer>img {
    width: 33px;
    height: 33px;
    border-radius: 100%;
    margin-right: 10px;
    border: 2px solid #fff;
}

.user-ditels {
    width: 300px;
    top: -100px;
    height: 100px;
    padding-bottom: 99px;
    position: absolute;
    border: solid 2px #fff;
    background-color: #34495E;
    right: 25px;
    display: none;
    z-index: 1;
}

@media (max-width:768px){
    .user-ditels {
    right: 5px;
}

}
.user-small-img{cursor: pointer;}

.content-footer:hover .user-ditels  {
    display: block;
}


.content-footer .user-ditels .user-img{width: 100px;height:100px;float: left;}
.user-full-ditels h3 {
    color: #fff;
    display: block;
    margin: 0px;
    padding-top: 10px;
    padding-right: 28px;
    text-align: right;
}
.user-full-ditels p{
    color: #fff;
    display: block;
    margin: 0px;
     padding-right: 20px;
    padding-top: 5px;
   text-align: right;}
.social-icon {
    background-color: #fff;
    margin-top: 10px;
    padding-right: 20px;
    text-align: right;
}
.social-icon>a{font-size:20px;text-decoration:none;padding: 5px;}
.social-icon a:nth-of-type(1){color:#4E71A8;}
.social-icon a:nth-of-type(2){color:#3FA1DA;}
.social-icon a:nth-of-type(3){color:#E3411F;}
.social-icon a:nth-of-type(4){color:#CA3737;}
.social-icon a:nth-of-type(5){color:#3A3A3A;}


/*recent-post-col////////////////////*/
.widget-sidebar {
    background-color: #fff;
    padding: 20px;
    margin-top: 30px;
}

.title-widget-sidebar {
    font-size: 14pt;
    border-bottom: 2px solid #e5ebef;
    margin-bottom: 15px;
    padding-bottom: 10px;
    margin-top: 0px;
}

.title-widget-sidebar:after {
    border-bottom: 2px solid #f1c40f;
    width: 150px;
    display: block;
    position: absolute;
    content: '';
    padding-bottom: 10px;
}

.recent-post{width: 100%;height: 80px;list-style-type: none;}
.post-img img {
    width: 100px;
    height: 70px;
    float: left;
    margin-right: 15px;
    border: 5px solid #16A085;
    transition: 0.5s;
}

.recent-post a {text-decoration: none;color:#34495E;transition: 0.5s;}
.post-img, .recent-post a:hover{color:#F39C12;}
.post-img img:hover{border: 5px solid #F39C12;}

/*===============ARCHIVES////////////////////////////*/



button.accordion {
    background-color: #16A085;
    color: #fff;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: #F39C12;color: #fff;
}

button.accordion:after {
    content: '\002B';
    color: #fff;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

button.accordion.active:after {
    content: "\2212";
}

.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}


/*categories//////////////////////*/

.categories-btn{
    background-color: #F39C12;
    margin-top:30px;
    color: #fff;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;

}
.categories-btn:after {
    content: '\25BA';
    color: #fff;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}
.categories-btn:hover {
    background-color: #16A085;color: #fff;
}

.form-control{border-radius: 0px;}

.btn-warning {
    border-radius: 0px;
    background-color: #F39C12;
    margin-top: 15px;
}
.input-group-addon{border-radius: 0px;}

.cover {
    width: 100px;
    height: 200px;
    object-fit: cover;
}
.story-box {
    display: table;
    width: 100%;
    margin: 10px 0;
}
.story-box div {
    display: table-cell;
    padding: 10px;
    border: none;
    border-bottom: 1px solid rgba(0,0,0,0.3);
}
.story-box div.story-scene {
    width: 10%;
    min-width: 75px;
    /*text-align: center;*/
}
.story-box div.story-thumbnail {
    width: 20%;
}
.story-box div.story-thumbnail img {
    width: 100%;
    max-height: 100px;
    object-fit: cover;
}
.story-box div.story-topic {
    width: 50%;
}
.story-box div.story-control {
    width: 20%;
    text-align: right;
}
.footer-control {
    padding: 20px 0;
    text-align: right;
}
.title-text {
    display: block;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    text-align: left;
}

.container {
    /*background-color: #fff;*/
}

</style>

<section id="blog-section" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row" style="margin-top: 10px; padding: 20px;">

                    <div class="form-group">
                        <p><img class="cover" src="/storage/thumbnail/{{ $scenario->thumbnail }}" style="width: 100%;"></p>
                    </div>
                    <div class="form-group">
                        {{ $errors->first('title') }}
                        <label for="exampleInputEmail1" class='control-label'>タイトル</label>
                        <p>{{ $scenario->title }}</p>
                    </div>
                    <div class="form-group">
                        <label for="descTextarea" class='control-label'>概要</label>
                        <p>{{ $scenario->description }}</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleCategory" class='control-label'>カテゴリ</label>
                        <p>{{ $scenario->label }}</p>
                    </div>
                    <div class="form-group">
                        <label for="contentTextarea" class='control-label'>ストーリー</label>
                        @foreach ($stories as $data)
                        <div class="story-box">
                            <div class="story-scene title-text">
                                <span>{{ $data->scene }}</span>
                            </div>
                            <div class="story-thumbnail">
                                <span><img src="/storage/stories/{{ $data->thumbnail }}" alt="{{ $data->scene }}{{ $data->topic }}"></span>
                            </div>
                            <div class="story-topic">
                                {{ $data->topic }}
                            </div>
                            <div class="story-control">
                                <a href="/show/{{ $scenario->id }}/story/{{ $data->id }}">
                                    <button type="button" class="btn btn-success">
                                        読む
                                    </button>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @if (count($stories) === 0)
                        <div class="serch-message-area" style="margin: 10px 0 20px 0; border-bottom: 1px solid rgba(0,0,0,0.3); border-top: 1px solid rgba(0,0,0,0.3);">
                            <h4 class="title text-success">「{{ $scenario->name }}」さんが最初のストーリーを執筆中です！お楽しみに！</h4>
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <a href="/">
                            <button type="button" class="btn btn-primary">
                                戻る
                            </button>
                        </a>
                    </div>

                </div>
            </div>

            @include('modules.right_box')

        </div>
    </div>

</section>
@endsection
