<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    <meta name="theme-color" content="#234556">
    <meta http-equiv="Content-Language" content="vi"/>
    <meta content="VN" name="geo.region"/>
    <meta name="DC.language" scheme="utf-8" content="vi"/>
    <meta name="language" content="Việt Nam">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <link rel="shortcut icon"
          href="https://www.pngkey.com/png/detail/360-3601772_your-logo-here-your-company-logo-here-png.png"
          type="image/x-icon"/>
    <meta name="revisit-after" content="1 days"/>
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1'/>

    <title>Phim Mới - Phim Hay</title>
    <meta name="description" content="Phim Mới - Phim Hay, xem phim online miễn phí, phim hot , phim nhanh"/>
    <link rel="canonical" href="">
    <link rel="next" href=""/>
    <meta property="og:locale" content="vi_VN"/>
    <meta property="og:title" content="Phim Mới - Phim Hay"/>
    <meta property="og:description"
          content="Phim Mới - Phim Hay, phim hay trung quốc, hàn quốc, việt nam, mỹ, hong kong , chiếu rạp"/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content="Phim Mới - Phim Hay"/>
    <meta property="og:image" content=""/>
    <meta property="og:image:width" content="300"/>
    <meta property="og:image:height" content="55"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel='dns-prefetch' href='//s.w.org'/>
    <link rel='stylesheet' id='bootstrap-css' href='{{ asset ('css/bootstrap.min.css') }}' media='all'/>
    <link rel='stylesheet' id='style-css' href='{{ asset ('css/style.css') }}' media='all'/>
    <link rel='stylesheet' id='wp-block-library-css' href='{{ asset ('css/style.min.css') }}' media='all'/>
    <script type='text/javascript' src='{{ asset ('js/jquery.min.js') }}' id='halim-jquery-js'></script>
    <style type="text/css" id="wp-custom-css">
        .textwidget p a img {
            width: 100%;
        }
    </style>
    <style>
        #header .site-title {
            background: url(https://www.pngkey.com/png/detail/360-3601772_your-logo-here-your-company-logo-here-png.png) no-repeat top left;
            background-size: contain;
            text-indent: -9999px;
        }
    </style>
</head>

<body class="home blog halimthemes halimmovies" data-masonry="">
{{--Header--}}
@include('layouts.FrontEnd.inc.header')

{{--NavBar--}}
@include('layouts.FrontEnd.inc.navbar')

{{--Content--}}
<div class="container">
    <div class="row fullwith-slider"></div>
</div>

<div class="container">
    @yield('content')
</div>

<div class="clearfix"></div>

{{--Footer--}}
@include('layouts.FrontEnd.inc.footer')

<div id='easy-top'></div>

<script type='text/javascript' src='{{ asset ('js/bootstrap.min.js?ver=5.7.2') }}' id='bootstrap-js'></script>
<script type='text/javascript' src='{{ asset ('js/owl.carousel.min.js?ver=5.7.2') }}' id='carousel-js'></script>
<script type='text/javascript' src='{{ asset ('js/halimtheme-core.min.js?ver=1626273138') }}'
        id='halim-init-js'></script>

<script type='text/javascript'>
    $(".watch_trailer").click(function (e) {
        e.preventDefault();
        var aid = $(this).attr("href");
        $('html, body').animate({scrollTop: $(aid).offset().top}, 'slow');
    })
</script>

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
            navText: ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],
            responsiveClass: true,
            responsive: {0: {items: 2}, 480: {items: 3}, 600: {items: 4}, 1000: {items: 4}}
        })
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            url: "{{url('/filter-topview-default')}}",
            method: "GET",
            success: function (data) {
                $('#show_data_default').html(data);
            }
        });

        $('.filter-sidebar').click(function () {
            var href = $(this).attr('href');
            if (href == '#ngay') {
                var value = 0;
            } else if (href == '#tuan') {
                var value = 1;
            } else {
                var value = 2;
            }
            $.ajax({
                url: "{{url('/filter-topview-phim')}}",
                method: "POST",
                data: {value: value},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $('#halim-ajax-popular-post-default').css("display", "none");
                    $('#show_data').html(data);
                }
            });
        })
    })
</script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0"
        nonce="vZ6TOkxT"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#timkiem').keyup(function () {
            $('#result').html('');
            var search = $('#timkiem').val();
            if (search != '') {
                var expression = new RegExp(search, "i");
                $.getJSON('/json_file/movies.json', function (data) {
                    //vòng lặp
                    $.each(data, function (key, value) {
                        if (value.title.search(expression) != -1 || value.description.search(expression) != -1) {
                            $('#result').css('display', 'inherit');
                            $('#result').append('<li style="cursor:pointer" class="list-group-item link-class"> ' +
                                '<img src ="/uploads/movie/' + value.image + '" height="40" width="40" class="" /> ' + value.title +
                                '<br> | <span class="text-muted" style="color:#cbd5e0;">' + value.description + '</span> ' +
                                '</li>');
                        }
                    });
                });
            } else {
                $('#result').css('display', 'none');
            }
        })
        $('#result').on('click', 'li', function () {
            var click_text = $(this).text().split('|');
            $('#timkiem').val($.trim(click_text[0]));
            $('#result').html('');
            $('#result').css('display', 'none');
        });
    })
</script>

<script type="text/javascript">
    function remove_background(movie_id) {
        for (var count = 1; count <= 5; count++) {
            $('#' + movie_id + '-' + count).css('color', '#ccc');
        }
    }

    //hover chuột đánh giá sao
    $(document).on('mouseenter', '.rating', function () {
        var index = $(this).data("index");
        var movie_id = $(this).data('movie_id');
        // alert(index);
        // alert(movie_id);
        remove_background(movie_id);
        for (var count = 1; count <= index; count++) {
            $('#' + movie_id + '-' + count).css('color', '#ffcc00');
        }
    });

    //nhả chuột ko đánh giá
    $(document).on('mouseleave', '.rating', function () {
        var index = $(this).data("index");
        var movie_id = $(this).data('movie_id');
        var rating = $(this).data("rating");
        remove_background(movie_id);
        //alert(rating);
        for (var count = 1; count <= rating; count++) {
            $('#' + movie_id + '-' + count).css('color', '#ffcc00');
        }
    });

    //click đánh giá sao
    $('.rating').click(function (event) {
        event.stopPropagation();
        var index = $(this).data("index");
        var movie_id = $(this).data("movie_id");

        console.log(index, movie_id);
        $.ajax({
            url: "{{ route('add-rating') }}",
            method: "POST",
            data: {index: index, movie_id: movie_id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data == 'done') {
                    alert("Bạn đã đánh giá " + index + " trên 5");
                    location.reload();
                } else if (data == 'exist') {
                    alert("Bạn đã đánh giá phim này rồi, cảm ơn bạn nhé");
                } else {
                    alert("Lỗi đánh giá");
                }
            },
            error: function (xhr, status, error) {
                // Xử lý lỗi
                alert(error, status, xhr);
            }
        });
    });
</script>

<style>
    .search-result {
        position: absolute;
        z-index: 9999;
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
        width: 93.5%;
        margin-top: 35px;
        padding: 10px;
        list-style: none;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
    }

    .search-result .list-group-item {
        padding: 5px;
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
    }
</style>

<style>#overlay_mb {
        position: fixed;
        display: none;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 99999;
        cursor: pointer
    }

    #overlay_mb .overlay_mb_content {
        position: relative;
        height: 100%
    }

    .overlay_mb_block {
        display: inline-block;
        position: relative
    }

    #overlay_mb .overlay_mb_content .overlay_mb_wrapper {
        width: 600px;
        height: auto;
        position: relative;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        text-align: center
    }

    #overlay_mb .overlay_mb_content .cls_ov {
        color: #fff;
        text-align: center;
        cursor: pointer;
        position: absolute;
        top: 5px;
        right: 5px;
        z-index: 999999;
        font-size: 14px;
        padding: 4px 10px;
        border: 1px solid #aeaeae;
        background-color: rgba(0, 0, 0, 0.7)
    }

    #overlay_mb img {
        position: relative;
        z-index: 999
    }

    @media only screen and (max-width: 768px) {
        #overlay_mb .overlay_mb_content .overlay_mb_wrapper {
            width: 400px;
            top: 3%;
            transform: translate(-50%, 3%)
        }
    }

    @media only screen and (max-width: 400px) {
        #overlay_mb .overlay_mb_content .overlay_mb_wrapper {
            width: 310px;
            top: 3%;
            transform: translate(-50%, 3%)
        }
    }</style>
<style>
    #overlay_pc {
        position: fixed;
        display: none;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 99999;
        cursor: pointer;
    }

    #overlay_pc .overlay_pc_content {
        position: relative;
        height: 100%;
    }

    .overlay_pc_block {
        display: inline-block;
        position: relative;
    }

    #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
        width: 600px;
        height: auto;
        position: relative;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    #overlay_pc .overlay_pc_content .cls_ov {
        color: #fff;
        text-align: center;
        cursor: pointer;
        position: absolute;
        top: 5px;
        right: 5px;
        z-index: 999999;
        font-size: 14px;
        padding: 4px 10px;
        border: 1px solid #aeaeae;
        background-color: rgba(0, 0, 0, 0.7);
    }

    #overlay_pc img {
        position: relative;
        z-index: 999;
    }

    @media only screen and (max-width: 768px) {
        #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
            width: 400px;
            top: 3%;
            transform: translate(-50%, 3%);
        }
    }

    @media only screen and (max-width: 400px) {
        #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
            width: 310px;
            top: 3%;
            transform: translate(-50%, 3%);
        }
    }
</style>

<style>
    .float-ck {
        position: fixed;
        bottom: 0px;
        z-index: 9
    }

    * html .float-ck /* IE6 position fixed Bottom */
    {
        position: absolute;
        bottom: auto;
        top: expression(eval (document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0)));
    }

    #hide_float_left a {
        background: #0098D2;
        padding: 5px 15px 5px 15px;
        color: #FFF;
        font-weight: 700;
        float: left;
    }

    #hide_float_left_m a {
        background: #0098D2;
        padding: 5px 15px 5px 15px;
        color: #FFF;
        font-weight: 700;
    }

    span.bannermobi2 img {
        height: 70px;
        width: 300px;
    }

    #hide_float_right a {
        background: #01AEF0;
        padding: 5px 5px 1px 5px;
        color: #FFF;
        float: left;
    }
</style>
</body>
</html>
