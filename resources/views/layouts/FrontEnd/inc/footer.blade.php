<footer id="footer" class="clearfix">
    <div class="container footer-columns">
        <div class="row container col-md-12">
            <div class="col-xs-12 col-sm-4 col-md-3">
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

            <div class="col-xs-12 col-sm-4 col-md-3">
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

            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-width=""
                     data-height="70px" data-small-header="true" data-adapt-container-width="true"
                     data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/facebook">Facebook</a></blockquote>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <p class="ud-footer-bottom-right text-center">
                Developed by
                <a href="https://www.facebook.com/HoangVan6501/" rel="nofollow">Hoàng Văn</a>
            </p>
        </div>

    </div>
</footer>
