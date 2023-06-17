@extends('layouts.FrontEnd.layout')

@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs">
                            <span>
                                <a href="{{ route('homepage') }}">Trang Chủ </a> /
                                <span>
                                    <a href="">{{$country_slug->title}}</a>
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
            <section>
                <div class="section-bar clearfix">
                    <h1 class="section-title">
                        <span>{{$country_slug->title}}</span>
                    </h1>
                </div>

                @include('pages.include.filter')

                <div class="halim_box">
                    @foreach($movie as $key => $country)
                        <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                            <div class="halim-item">
                                <a class="halim-thumb" href="{{ route('movie',$country->slug) }}"
                                   title="{{$country->title}}">
                                    <figure>
                                        <img class="lazy img-responsive"
                                             src="{{asset('uploads/movie/'.$country->image)}}"
                                             alt="{{$country->title}}" title="{{$country->title}}">
                                    </figure>
                                    <span class="status">
                                        @if($country->resolution == 0)
                                            HD
                                        @elseif($country->resolution == 1)
                                            SD
                                        @elseif($country->resolution == 2)
                                            HDCam
                                        @elseif($country->resolution == 3)
                                            Cam
                                        @elseif($country->resolution == 4)
                                            FullHD
                                        @else
                                            Trailer
                                        @endif
                                    </span>
                                    @if($country->resolution != 5)
                                        <span class="episode">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                            {{ $country->episode_count }}/{{ $country->SoTap }} |
                                            @if($country->phude == 0)
                                                Phụ Đề
                                            @else
                                                Thuyết Minh
                                            @endif
                                        </span>
                                    @endif
                                    <div class="icon_overlay"></div>
                                    <div class="halim-post-title-box">
                                        <div class="halim-post-title ">
                                            <p class="entry-title">{{$country->title}}</p>
                                            <p class="original_title">{{$country->name_original}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
                <div class="clearfix"></div>
                <div class="text-center">
                    {!! $movie->links("pagination::bootstrap-4") !!}
                </div>
            </section>
        </main>
        {{--Sidebar--}}
        @include('pages.include.sidebar')
    </div>
@endsection
