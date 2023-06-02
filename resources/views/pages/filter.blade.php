@extends('layouts.FrontEnd.layout')

@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs">
                            <span>
                                <span>
                                    <span class="breadcrumb_last" aria-current="page"></span>
                                    <a href="">Lọc Phim</a>
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
                        <span>Lọc Phim</span>
                    </h1>
                </div>

                <div class="section-bar clearfix">
                    <div class="row">
                        <form action="{{ route('locphim') }}" method="GET">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" name="order" id="exampleFormControlSelect1">
                                        <option value="">Sắp Xếp</option>
                                        <option value="date">Ngày Đăng</option>
                                        <option value="year_release">Năm Sản Xuất</option>
                                        <option value="name_a_z">Tên Phim</option>
                                        <option value="watch_views">Lượt Xem</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" name="genre" id="exampleFormControlSelect1">
                                        <option value="">Thể Loại</option>
                                        @foreach($TheLoai as $key => $gen_filter)
                                            <option value="{{ $gen_filter->id }}">{{ $gen_filter->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" name="country" id="exampleFormControlSelect1">
                                        <option value="">Quốc Gia</option>
                                        @foreach($QuocGia as $key => $country_filter)
                                            <option
                                                value="{{ $country_filter->id }}">{{ $country_filter->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    {{--                                    <select class="form-control" id="exampleFormControlSelect1">--}}
                                    {{--                                        <option>-- Năm --</option>--}}
                                    {{--                                        @for($year=2000; $year<=2023;$year++)--}}
                                    {{--                                            <option value="{{ $year }}">{{ $year }}</option>--}}
                                    {{--                                        @endfor--}}
                                    {{--                                    </select>--}}
                                    {!! Form::selectYear('year', 2000, 2023, null, ['class'=>'form-control', 'placeholder'=>'Năm']) !!}
                                </div>
                            </div>

                            <input type="submit" class="btn btn-sm btn-default" value="Lọc Phim">
                        </form>
                    </div>
                </div>

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
                                        {{ $cate->episode_count }}/{{ $cate->SoTap }} |
                                        @if($cate->phude == 0)
                                                Phụ Đề
                                            @else
                                                Thuyết Minh
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
