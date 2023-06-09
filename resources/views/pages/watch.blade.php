@extends('layouts.FrontEnd.layout')

@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="yoast_breadcrumb hidden-xs">
                            <span>
                                <a href="{{ route('homepage') }}">Trang Chủ</a> /
                                <span>
                                    <a href="{{route('category',[$movie->category->slug])}}">{{$movie->category->title}}</a> /
                                    <span>
                                        <a href="{{route('country',[$movie->country->slug])}}">{{$movie->country->title}}</a> /
                                        @foreach($movie->movie_genre as $gen)
                                            <a href="{{route('genre',[$gen->slug])}}">{{$gen->title}}</a> /
                                        @endforeach
                                        <span class="breadcrumb_last" aria-current="page">{{$movie->title}}</span>
                                    </span>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>

        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section id="content" class="test">
                <div class="clearfix wrap-content">
                    <style type="text/css">
                        .iframe_phim iframe {
                            width: 100%;
                            height: 500px;
                        }
                    </style>

                    <div class="iframe_phim">
                        {!! $episode->linkphim !!}
                    </div>

                    <div class="button-watch">
                        <ul class="halim-social-plugin col-xs-4 hidden-xs">
                            <li class="fb-like" data-href="" data-layout="button_count" data-action="like"
                                data-size="small" data-show-faces="true" data-share="true"></li>
                        </ul>
                    </div>

                    <div class="collapse" id="moretool">
                        <ul class="nav nav-pills x-nav-justified">
                            <li class="fb-like" data-href="" data-layout="button_count" data-action="like"
                                data-size="small" data-show-faces="true" data-share="true"></li>
                            <div class="fb-save" data-uri="" data-size="small"></div>
                        </ul>
                    </div>


                    <div class="clearfix"></div>
                    <div class="clearfix"></div>
                    <div class="title-block">
                        <a href="javascript:;" data-toggle="tooltip" title="Add to bookmark">
                            <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="37976">
                                <div class="halim-pulse-ring"></div>
                            </div>
                        </a>
                        <div class="title-wrapper-xem full">
                            <h1 class="entry-title">
                                <a href="" title="{{$movie->title}}" class="tl">
                                    {{$movie->title}}
                                </a>
                            </h1>

                            <style>
                                .title-wrapper-xem {
                                    border-bottom: 0px;
                                }

                                .entry-title a {
                                    display: inline-block;
                                    white-space: nowrap;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                }
                            </style>
                        </div>
                    </div>

                    <div class="entry-content htmlwrap clearfix collapse" id="expand-post-content">
                        <article id="post-37976" class="item-content post-37976"></article>
                    </div>

                    <div class="clearfix"></div>
                    <div class="text-center">
                        <div id="halim-ajax-list-server"></div>
                    </div>

                    <div id="halim-list-server">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active server-1">
                                <a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab">
                                    @if($movie->resolution == 0)
                                        HD
                                    @elseif($movie->resolution == 1)
                                        SD
                                    @elseif($movie->resolution == 2)
                                        HDCam
                                    @elseif($movie->resolution == 3)
                                        Cam
                                    @elseif($movie->resolution == 4)
                                        FullHD
                                    @else
                                        Trailer
                                    @endif
                                </a>
                            </li>
                            <li role="presentation" class="active server-1">
                                <a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab">
                                    @if($movie->resolution != 5)
                                        @if($movie->phude == 0)
                                            Phụ Đề
                                        @else
                                            Thuyết Minh
                                        @endif
                                    @endif
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active server-1" id="server-0">
                                <div class="halim-server">
                                    <ul class="halim-list-eps">
                                        @foreach($movie->episode as $key => $sotap)
                                            <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$sotap->episode)}}">
                                                <li class="halim-episode">
                                                    <span
                                                        class="halim-btn halim-btn-2 {{ $tapphim==$sotap->episode ? 'active' : ''}} halim-info-1-1 box-shadow"
                                                        data-post-id="37976" data-server="1" data-episode="1"
                                                        data-position="first" data-embed="0"
                                                        data-title="Xem phim {{$movie->title}} - Tập {{$sotap->episode}} - {{$movie->name_original}} -
                                                        @if($movie->resolution != 5)
                                                            @if($movie->phude == 0)
                                                                Phụ Đề
                                                            @else
                                                                Thuyết Minh
                                                            @endif
                                                        @endif"
                                                        data-h1="{{$movie->title}} - tập {{$sotap->episode}}">{{$sotap->episode}}
                                                    </span>
                                                </li>
                                            </a>
                                        @endforeach
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    {{--Comments Phim--}}
                    <div class="section-bar clearfix">
                        <h2 class="section-title">
                            <span style="color:#ffed4d">Bình Luận Phim</span>
                        </h2>
                    </div>

                    <div class="entry-content htmlwrap clearfix" style="background-color: white">
                        <div class="video-item halim-entry-box">
                            @php
                                $current_url = Request::url();
                            @endphp
                            <article id="post-38424" class="item-content">
                                <div class="fb-comments" data-href="{{ $current_url }}" data-width="100%"
                                     data-numposts="10"></div>
                            </article>
                        </div>
                    </div>
                </div>
            </section>

            <section class="related-movies">
                <div id="halim_related_movies-2xx" class="wrap-slider">
                    <div class="section-bar clearfix">
                        <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                    </div>
                    <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                        @foreach($related as $key => $hot)
                            <article class="thumb grid-item post-38498">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="{{route('movie',$hot->slug)}}" title="{{$hot->title}}">
                                        <figure>
                                            <img class="lazy img-responsive"
                                                 src="{{asset('uploads/movie/'.$hot->image)}}" alt="{{$hot->title}}"
                                                 title="{{$hot->title}}">
                                        </figure>
                                        <span class="status">
                                            @if($hot->resolution == 0)
                                                HD
                                            @elseif($hot->resolution == 1)
                                                SD
                                            @elseif($hot->resolution == 2)
                                                HDCam
                                            @elseif($hot->resolution == 3)
                                                Cam
                                            @elseif($hot->resolution == 4)
                                                FullHD
                                            @else
                                                Trailer
                                            @endif
                                        </span>
                                        @if($hot->resolution != 4)
                                            <span class="episode">
                                                <i class="fa fa-play" aria-hidden="true"></i>
                                                    @if($hot->phude == 0)
                                                    Phụ Đề - Tập 1/{{ $hot->SoTap }}
                                                @else
                                                    Thuyết Minh - Tập 1/{{ $hot->SoTap }}
                                                @endif
                                            </span>
                                        @endif
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">{{$hot->title}}</p>
                                                <p class="original_title">{{$hot->name_original}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        @endforeach

                    </div>
                    <link rel="stylesheet"
                          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
                          integrity="sha512-..." crossorigin="anonymous"/>
                    <script>
                        $(document).ready(function ($) {
                            var owl = $('#halim_related_movies-2');
                            owl.owlCarousel({
                                loop: true,
                                margin: 4,
                                autoplay: true,
                                autoplayTimeout: 4000,
                                autoplayHoverPause: true,
                                nav: true,
                                navText: [
                                    '<i class="fas fa-chevron-left"></i>',
                                    '<i class="fas fa-chevron-right"></i>'
                                ],
                                responsiveClass: true,
                                responsive: {0: {items: 2}, 480: {items: 3}, 600: {items: 4}, 1000: {items: 4}}
                            })
                        });
                    </script>
                </div>
            </section>
        </main>
        {{--Sidebar--}}
        @include('pages.include.sidebar')
    </div>
@endsection
