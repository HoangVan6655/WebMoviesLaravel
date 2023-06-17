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

                    <div class="halim-movie-wrapper">
                        <div class="movie_info col-xs-12">
                            <div class="movie-poster col-md-3">
                                <img class="movie-thumb" src="{{asset('uploads/movie/'.$movie->image)}}"
                                     alt="{{$movie->title}}">
                                @if($episode_current_list_count>0)
                                    <div class="bwa-content">
                                        <div class="loader"></div>
                                        <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$episode_tapdau->episode)}}"
                                           class="bwac-btn">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                @endif
                            </div>

                            <div class="film-poster col-md-9">
                                <h1 class="movie-title title-1"
                                    style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$movie->title}}</h1>
                                <h2 class="movie-title title-2" style="font-size: 12px;">{{$movie->name_original}}</h2>
                                <ul class="list-info-group" style="overflow-y: scroll; max-height: 258px;">
                                    {{--Chất Lượng Phim--}}
                                    <li class="list-info-group-item">
                                        <span>Chất Lượng Phim</span> :
                                        <span class="quality">
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
                                        </span>
                                    </li>

                                    {{--Phụ Đề Phim--}}
                                    <li class="list-info-group-item">
                                        <span>Phụ Đề Phim</span> :
                                        @if($movie->resolution != 5)
                                            <span class="episode">
                                                @if($movie->phude == 0)
                                                    Phụ Đề
                                                @else
                                                    Thuyết Minh
                                                @endif
                                            </span>
                                        @endif
                                    </li>

                                    {{--Thời Lượng Phim--}}
                                    <li class="list-info-group-item">
                                        <span>Thời Lượng Phim</span> : {{$movie->ThoiLuong}}
                                    </li>

                                    {{--Nếu Thuộc Phim Bộ thì hiện tổng số tập--}}
                                    @if($movie->ThuocPhim == 'phimbo')
                                        <li class="list-info-group-item">
                                            <span>Số Tập Phim</span> : {{$episode_current_list_count}}/{{$movie->SoTap}}
                                            -
                                            @if($episode_current_list_count == $movie->SoTap)
                                                Hoàn Thành
                                            @else
                                                Đang Cập Nhật
                                            @endif
                                        </li>
                                    @else
                                        <li class="list-info-group-item">
                                            <span>Thuộc Loại Phim</span> : Phim Lẻ
                                        </li>
                                    @endif

                                    {{--Season Phim--}}
                                    @if($movie->season != 0)
                                        <li class="list-info-group-item"><span>Season Phim</span> : {{$movie->season}}
                                        </li>
                                    @endif

                                    {{--Thể Loại Phim--}}
                                    <li class="list-info-group-item"><span>Thể Loại Phim</span> :
                                        @foreach($movie->movie_genre as $gen)
                                            <a href="{{route('genre',$gen->slug)}}"
                                               rel="category tag">{{$gen->title}}</a>
                                        @endforeach
                                    </li>

                                    {{--Danh Mục Phim--}}
                                    <li class="list-info-group-item"><span>Danh Mục Phim</span> :
                                        <a href="{{route('category',$movie->category->slug)}}"
                                           rel="category tag">{{$movie->category->title}}</a>
                                    </li>

                                    {{--Quốc Gia Phim--}}
                                    <li class="list-info-group-item"><span>Quốc Gia Phim</span> :
                                        <a href="{{route('country',$movie->country->slug)}}"
                                           rel="tag">{{$movie->country->title}}</a>
                                    </li>

                                    {{--Năm Phim--}}
                                    <li class="list-info-group-item"><span>Năm Phim</span> :
                                        <a href="{{url('nam',$movie->year)}}"
                                           rel="tag">{{$movie->year}}</a>
                                    </li>

                                    {{--Nếu thuộc phim bộ thì hiện tập phim mới nhất--}}
                                    @if($episode_current_list_count>0)
                                        @if($movie->ThuocPhim == 'phimbo')
                                            <li class="list-info-group-item"><span>Tập Phim Mới Nhất</span> :
                                                @foreach($episode as $key => $ep)
                                                    <a href="{{url('xem-phim/'.$ep->movie->slug.'/tap-'.$ep->episode)}}"
                                                       rel="tag">Tập {{$ep->episode}}</a>
                                                @endforeach
                                            </li>
                                        @elseif ($movie->ThuocPhim == 'phimle')
                                            <li class="list-info-group-item"><span>Link Phim</span> :
                                                @foreach($episode as $key => $ep)
                                                    <a href="{{url('xem-phim/'.$ep->movie->slug.'/tap-'.$ep->episode)}}"
                                                       rel="tag">{{ $ep->episode }}</a>
                                                @endforeach

                                            </li>
                                        @endif
                                    @else
                                        <li class="list-info-group-item"><span>Tập Phim : Đang Cập Nhật</span>
                                    @endif
                                </ul>
                                <div class="movie-trailer hidden"></div>
                            </div>
                        </div>

                        <div class="">
                            <div class="group">
                                @if($movie->resolution != 5)
                                    @if($episode_current_list_count>0)
                                        <div class="btn-group">
                                            <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$episode_tapdau->episode)}}"
                                               class="bwac-btn btn btn-danger"
                                               style="display: block; margin-left: 10px; margin-right: 5px">Xem Phim</a>
                                            <a href="#watch_trailer"
                                               class="watch_trailer btn btn-primary"
                                               style="display: block">Xem Trailer</a>
                                        </div>
                                    @endif
                                @else
                                    <div class="btn-group">
                                        <a href="#watch_trailer" class="watch_trailer btn btn-primary"
                                           style="display: block; margin-left: 60px">Xem Trailer</a>
                                    </div>
                                @endif


                                <ul class="list-inline rating" title="Average Rating">
                                    @for($count=1; $count<=5; $count++)
                                        @php
                                            if($count<=$rating){
                                              $color = 'color:#ffcc00;'; //mau vang
                                            }
                                            else {
                                              $color = 'color:#ccc;'; //mau xam
                                            }
                                        @endphp
                                        <li title="star_rating"
                                            id="{{$movie->id}}-{{$count}}"
                                            data-index="{{$count}}"
                                            data-movie_id="{{$movie->id}}"
                                            data-rating="{{$rating}}"
                                            class="rating"
                                            style="cursor:pointer; {{$color}}
                                            font-size:30px;">&#9733;
                                        </li>
                                    @endfor
                                </ul>
                                    <span class="total_rating"
                                          style="margin-left: 250px; margin-top: 10px; justify-content: center"> Đánh Giá: {{ $rating }}/{{ $count_total }} Lượt</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="clearfix"></div>
                <div id="halim_trailer"></div>
                <div class="clearfix"></div>

                {{--Nội Dung Phim--}}
                <div class="section-bar clearfix">
                    <h2 class="section-title"><span style="color:#ffed4d">Nội Dung Phim</span></h2>
                </div>
                <div class="entry-content htmlwrap clearfix">
                    <div class="video-item halim-entry-box">
                        <article id="post-38424" class="item-content">
                            {{$movie->description}}
                        </article>
                    </div>
                </div>

                {{--Tags Phim--}}
                <div class="section-bar clearfix">
                    <h2 class="section-title"><span style="color:#ffed4d">Tags Phim</span></h2>
                </div>
                <div class="entry-content htmlwrap clearfix">
                    <div class="video-item halim-entry-box">
                        <article id="post-38424" class="item-content">
                            @if($movie->tags!=NULL)
                                @php
                                    $tags = array();
                                    $tags = explode(',', $movie->tags);
                                @endphp
                                @foreach($tags as $key => $tag)
                                    <a href="{{ url('tag',$tag) }}">{{ $tag }}</a>
                                @endforeach
                            @else
                                {{ $movie->title }}
                            @endif
                        </article>
                    </div>
                </div>

                {{--Trailer Phim--}}
                <div class="section-bar clearfix">
                    <h2 class="section-title"><span style="color:#ffed4d">Trailer Phim</span></h2>
                </div>
                <div class="entry-content htmlwrap clearfix">
                    <div class="video-item halim-entry-box">
                        <article id="watch_trailer" class="item-content">
                            <iframe
                                width="100%"
                                height="500"
                                src="https://www.youtube.com/embed/{{ $movie->trailer }}"
                                title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                            </iframe>
                        </article>
                    </div>
                </div>

                {{--Comments Phim--}}
                <div class="section-bar clearfix">
                    <h2 class="section-title"><span style="color:#ffed4d">Bình Luận Phim</span></h2>
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
                                                 title="Đại Thánh Vô Song">
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
                                        @if($hot->resolution != 5)
                                            <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
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
                                responsive: {
                                    0: {
                                        items: 2
                                    },
                                    480: {
                                        items: 3
                                    },
                                    600: {
                                        items: 4
                                    },
                                }
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
