@extends('layouts.FrontEnd.layout')

@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">{{$search}}</a> » <span
                                        class="breadcrumb_last" aria-current="page">2023</span></span></span></div>
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
                    <h1 class="section-title"><span>{{$search}}</span></h1>
                </div>

                @include('pages.include.filter')

                <div class="halim_box">
                    @foreach($movie as $key => $cate)
                        <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                            <div class="halim-item">
                                <a class="halim-thumb" href="{{ route('movie',$cate->slug) }}" title="{{$cate->title}}">
                                    <figure><img class="lazy img-responsive"
                                                 src="{{asset('uploads/movie/'.$cate->image)}}" alt="{{$cate->title}}"
                                                 title="{{$cate->title}}"></figure>
                                    <span class="status">
                                    @if($cate->resolution == 0)
                                            HD
                                        @elseif($cate->resolution == 1)
                                            SD
                                        @elseif($cate->resolution == 2)
                                            HDCam
                                        @elseif($cate->resolution == 3)
                                            Cam
                                        @elseif($cate->resolution == 4)
                                            FullHD
                                        @else
                                            Trailer
                                        @endif
                                </span>
                                    @if($cate->resolution != 5)
                                        <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                        @if($cate->phude == 0)
                                                Phụ Đề - Tập 1/{{ $cate->SoTap }}
                                                @if($cate->season != 0)
                                                    - Season {{ $cate->season }}
                                                @endif
                                            @else
                                                Thuyết Minh - Tập 1/{{ $cate->SoTap }}
                                                @if($cate->season != 0)
                                                    - Season {{ $cate->season }}
                                                @endif
                                            @endif
                                    </span>
                                    @endif
                                    <div class="icon_overlay"></div>
                                    <div class="halim-post-title-box">
                                        <div class="halim-post-title ">
                                            <p class="entry-title">{{$cate->title}}</p>
                                            <p class="original_title">{{$cate->name_original}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
                <div class="clearfix"></div>
                <div class="text-center">
                    {{--                    <ul class='page-numbers'>--}}
                    {{--                        <li><span aria-current="page" class="page-numbers current">1</span></li>--}}
                    {{--                        <li><a class="page-numbers" href="">2</a></li>--}}
                    {{--                        <li><a class="page-numbers" href="">3</a></li>--}}
                    {{--                        <li><span class="page-numbers dots">&hellip;</span></li>--}}
                    {{--                        <li><a class="page-numbers" href="">55</a></li>--}}
                    {{--                        <li><a class="next page-numbers" href=""><i class="hl-down-open rotate-right"></i></a></li>--}}
                    {{--                    </ul>--}}
                    {!! $movie->links("pagination::bootstrap-4") !!}
                </div>
            </section>
        </main>
        {{--Sidebar--}}
        @include('pages.include.sidebar')
    </div>
@endsection
