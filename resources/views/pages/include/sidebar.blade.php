<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Phim Hot</span>
                {{--                            <ul class="halim-popular-tab" role="tablist">--}}
                {{--                                <li role="presentation" class="active">--}}
                {{--                                    <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="today">Day</a>--}}
                {{--                                </li>--}}
                {{--                                <li role="presentation">--}}
                {{--                                    <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="week">Week</a>--}}
                {{--                                </li>--}}
                {{--                                <li role="presentation">--}}
                {{--                                    <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="month">Month</a>--}}
                {{--                                </li>--}}
                {{--                                <li role="presentation">--}}
                {{--                                    <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="all">All</a>--}}
                {{--                                </li>--}}
                {{--                            </ul>--}}
            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">
                    @foreach($movieHot_sidebar as $key => $hot_sidebar)
                        <div class="item post-37176">
                            <a href="{{route('movie',$hot_sidebar->slug)}}" title="{{ $hot_sidebar->title }}">
                                <div class="item-link">
                                    <img src="{{ asset('uploads/movie/'.$hot_sidebar->image) }}" class="lazy post-thumb" alt="{{ $hot_sidebar->title }}" title="{{ $hot_sidebar->title }}" />
                                    <span class="is_trailer">
                                                 @if($hot_sidebar->resolution == 0)
                                            HD
                                        @elseif($hot_sidebar->resolution == 1)
                                            SD
                                        @elseif($hot_sidebar->resolution == 2)
                                            HDCam
                                        @elseif($hot_sidebar->resolution == 3)
                                            Cam
                                        @else
                                            FullHD
                                        @endif
                                            </span>
                                </div>
                                <p class="title">{{ $hot_sidebar->title }}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                 <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                 <span style="width: 0%"></span>
                                 </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
</aside>

<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Top Lượt Xem</span>
            </div>
        </div>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link filter-sidebar" id="pills-home-tab" data-toggle="pill" href="#ngay" role="tab" aria-controls="pills-home" aria-selected="true">Ngày</a>
            </li>
            <li class="nav-item">
                <a class="nav-link filter-sidebar" id="pills-profile-tab" data-toggle="pill" href="#tuan" role="tab" aria-controls="pills-profile" aria-selected="false">Tuần</a>
            </li>
            <li class="nav-item">
                <a class="nav-link filter-sidebar" id="pills-contact-tab" data-toggle="pill" href="#thang" role="tab" aria-controls="pills-contact" aria-selected="false">Tháng</a>
            </li>
        </ul>
        <span id="show_default"></span>
        <div class="tab-content" id="myTabContent">
            <div class="popular-post" id="halim-ajax-popular-post-default">
                <span id="show_data_default"></span>
            </div>
            <div class="tab-pane fade show active" id="tuan" role="tabpanel" aria-labelledby="home-tab">
                <div class="popular-post" id="halim-ajax-popular-post">
                    <span id="show_data"></span>
                </div>
            </div>

        </div>

        <div class="clearfix"></div>
    </div>
</aside>
