<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Movies Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href='{{ asset ('admin/vendors/mdi/css/materialdesignicons.min.css') }}'>
    <link rel="stylesheet" href='{{ asset ('admin/vendors/css/vendor.bundle.base.css') }}'>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"--}}
    {{--          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">--}}

    <link rel="stylesheet" href='{{ asset ('admin/vendors/jvectormap/jquery-jvectormap.css') }}'>
    <link rel="stylesheet" href='{{ asset ('admin/vendors/flag-icon-css/css/flag-icon.min.css') }}'>
    <link rel="stylesheet" href='{{ asset ('admin/vendors/owl-carousel-2/owl.carousel.min.css') }}'>
    <link rel="stylesheet" href='{{ asset ('admin/vendors/owl-carousel-2/owl.theme.default.min.css') }}'>
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href='{{ asset ('admin/css/style.css') }}'>
    <!-- End layout styles -->
    <link rel="shortcut icon" href='{{ asset ('admin/images/logo-favicon.png') }}'/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('layouts.Admin.include.sidebar')

    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('layouts.Admin.include.navbar')

        <!-- partial -->
        <div class="main-panel">
            @yield('content')
            <!-- content-wrapper ends -->

            <!-- partial:partials/_footer.html -->
            @include('layouts.Admin.include.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<!-- container-scroller -->
{{--Ckeditor--}}
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
<!-- plugins:js -->
<script src='{{ asset ('admin/vendors/js/vendor.bundle.base.js') }}'></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src='{{ asset ('admin/vendors/chart.js/Chart.min.js') }}'></script>
<script src='{{ asset ('admin/vendors/progressbar.js/progressbar.min.js') }}'></script>
<script src='{{ asset ('admin/vendors/jvectormap/jquery-jvectormap.min.js') }}'></script>
<script src='{{ asset ('admin/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}'></script>
<script src='{{ asset ('admin/vendors/owl-carousel-2/owl.carousel.min.js') }}'></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src='{{ asset ('admin/js/off-canvas.js') }}'></script>
<script src='{{ asset ('admin/js/hoverable-collapse.js') }}'></script>
<script src='{{ asset ('admin/js/misc.js') }}'></script>
<script src='{{ asset ('admin/js/settings.js') }}'></script>
<script src='{{ asset ('admin/js/todolist.js') }}'></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src='{{ asset ('admin/js/dashboard.js') }}'></script>

{{--Script Boostrap--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>

{{--Script Jquery--}}
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

{{--Script Data Table--}}
<script type='text/javascript' src='{{ asset ('js/jquery.dataTables.min.js') }}'></script>

<script type="text/javascript">
    {{--Script chuyển title sang slug--}}
    function ChangeToSlug() {
        var slug;
        //Lấy text từ thẻ input title
        slug = document.getElementById("title").value;
        slug = slug.toLowerCase();
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('convert_slug').value = slug;
    }

    {{--Script cập nhật hình ảnh ajax--}}
    $(document).on('change', '.file_image', function () {
        var movie_id = $(this).data('movie_id');
        var files = $("#file-" + movie_id)[0].files;

        var image = document.getElementById("file-" + movie_id).files[0];

        var form_data = new FormData();

        form_data.append("file", document.getElementById("file-" + movie_id).files[0]);
        form_data.append("movie_id", movie_id);

        $.ajax({
            url: "{{ route('update-image-ajax') }}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function () {
                location.reload();
                $('#success_image').html('<span class="text-success">Cập Nhật Hình Ảnh Thành Công</span>');
            }
        })
    })

    {{--Script select định dạng ajax--}}
    $('.resolution_choose').change(function () {
        var resolution_val = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('resolution-choose') }}",
            method: "GET",
            data: {resolution_val: resolution_val, movie_id: movie_id},
            success: function (data) {
                alert('Thay đổi thành công.');
            }
        });
    })

    {{--Script select phụ đề ajax--}}
    $('.phude_choose').change(function () {
        var phude_val = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('phude-choose') }}",
            method: "GET",
            data: {phude_val: phude_val, movie_id: movie_id},
            success: function (data) {
                alert('Thay đổi thành công.');
            }
        });
    })

    {{--Script select category ajax--}}
    $('.category_choose').change(function () {
        var category_id = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('category-choose') }}",
            method: "GET",
            data: {category_id: category_id, movie_id: movie_id},
            success: function (data) {
                alert('Thay đổi thành công.');
            }
        });
    })

    {{--Script select thuộc phim ajax--}}
    $('.thuocphim_choose').change(function () {
        var thuocphim_val = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('thuocphim-choose') }}",
            method: "GET",
            data: {thuocphim_val: thuocphim_val, movie_id: movie_id},
            success: function (data) {
                alert('Thay đổi thành công.');
            }
        });
    })

    {{--Script select country ajax--}}
    $('.country_choose').change(function () {
        var country_id = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('country-choose') }}",
            method: "GET",
            data: {country_id: country_id, movie_id: movie_id},
            success: function (data) {
                alert('Thay đổi thành công.');
            }
        });
    })

    {{--Script select movie hot ajax--}}
    $('.phimhot_choose').change(function () {
        var phimhot_val = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('phimhot-choose') }}",
            method: "GET",
            data: {phimhot_val: phimhot_val, movie_id: movie_id},
            success: function (data) {
                alert('Thay đổi thành công.');
            }
        });
    })

    {{--Script select year ajax--}}
    $('.select-year').change(function () {
        var year = $(this).find(':selected').val();
        var id_phim = $(this).attr('id');
        $.ajax({
            url: "{{ url('/update-year-phim') }}",
            method: "GET",
            data: {year: year, id_phim: id_phim},
            success: function () {
                alert('Thay đổi năm phim theo năm ' + year + ' thành công');
            }
        });
    })

    {{--Script Update Season ajax--}}
    $('.select-season').change(function () {
        var season = $(this).find(':selected').val();
        var id_phim = $(this).attr('id');
        $.ajax({
            url: "{{ url('/update-season-phim') }}",
            method: "GET",
            data: {season: season, id_phim: id_phim},
            success: function () {
                alert('Thay đổi mùa phim theo mùa ' + season + ' thành công');
            }
        });
    })

    {{--Script Update View theo ngày-tháng-năm ajax--}}
    $('.select-topview').change(function () {
        var topview = $(this).find(':selected').val();
        var id_phim = $(this).attr('id');
        if (topview == 0) {
            var text = 'Ngày';
        } else if (topview == 1) {
            var text = 'Tháng';
        } else {
            var text = 'Năm';
        }
        $.ajax({
            url: "{{ url('/update-topview-phim') }}",
            method: "GET",
            data: {topview: topview, id_phim: id_phim},
            success: function () {
                alert('Thay đổi phim theo lượt truy cập ' + topview + ' thành công');
            }
        });
    })

    {{--Script select status ajax--}}
    $('.status_choose').change(function () {
        var status_val = $(this).val();
        var movie_id = $(this).attr('id');
        $.ajax({
            url: "{{ route('status-choose') }}",
            method: "GET",
            data: {status_val: status_val, movie_id: movie_id},
            success: function (data) {
                alert('Thay đổi thành công.');
            }
        });
    })

    {{--Script select Movie ajax--}}
    $('.select-movie').change(function () {
        var id = $(this).val();
        $.ajax({
            url: "{{ route('select-movie') }}",
            method: "GET",
            data: {id: id},
            success: function (data) {
                $('#show_movie').html(data);
                console.log(data);
            }
        });
    });
</script>
<!-- End custom js for this page -->
</body>
</html>
