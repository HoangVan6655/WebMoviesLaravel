<footer id="footer" class="clearfix">
    <div class="container footer-columns" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
        <div class="row container col-md-12">
            <div class="col-xs-12 col-sm-4 col-md-3" style="flex-basis: calc(33.33% - 20px); margin-bottom: 20px;">
                <div class="widget about">
                    <div class="footer-logo" style="margin-top: 5px">
                        <a href="{{ route('homepage') }}">
                            <img src='{{ asset ('admin/images/logo.png') }}' alt="logo"/>
                        </a>
                    </div>
                    <div class="text-justify">
                        Trang xem phim Online với giao diện được bố trí và thiết kế thân thiện với người dùng. Nguồn
                        phim được tổng hợp từ các website lớn với đa dạng các đầu phim và thể loại vô cùng phong phú.
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-3" style="flex-basis: calc(33.33% - 20px); margin-bottom: 20px;">
                <div class="ud-widget">
                    <h4 class="ud-widget-title" style="margin-top: 40px">Danh Mục Phim</h4>
                    <ul class="ud-widget-links" style="list-style: none; padding-left: 0;">
                        @foreach($category as $key => $cate)
                            <li class="mega">
                                <a title="{{$cate->title}}" href="{{ route('category', $cate->slug) }}">
                                    {{$cate->title}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-3" style="flex-basis: calc(33.33% - 20px); margin-bottom: 20px;">
                <div class="ud-widget">
                    <h4 class="ud-widget-title" style="margin-top: 40px">Thể Loại Phim</h4>
                    <ul class="ud-widget-links" style="list-style: none; padding-left: 0;">
                        @foreach($TheLoai as $key => $gen)
                            @if($key < 5)
                                <li class="mega">
                                    <a title="{{$gen->title}}" href="{{ route('genre', $gen->slug) }}">
                                        Phim {{$gen->title}}
                                    </a>
                                </li>
                            @else
                                @break
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-3" style="flex-basis: calc(33.33% - 20px); margin-bottom: 20px;">
                <div class="ud-widget">
                    <h4 class="ud-widget-title" style="margin-top: 40px">Quốc Gia Phim</h4>
                    <ul class="ud-widget-links" style="list-style: none; padding-left: 0;">
                        @foreach($QuocGia as $key => $country)
                            @if($key < 5)
                                <li class="mega">
                                    <a title="{{$country->title}}" href="{{ route('country', $country->slug) }}">
                                        Phim {{$country->title}}
                                    </a>
                                </li>
                            @else
                                @break
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <p class="ud-footer-bottom-right text-center" style="margin-top: 20px;">
                Developed by
                <a href="https://www.facebook.com/HoangVan6501/" rel="nofollow">Hoàng Văn</a>
            </p>
        </div>
    </div>
</footer>
