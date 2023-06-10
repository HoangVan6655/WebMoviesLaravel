@extends('layouts.Admin.admin')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Thêm Mới Phim</h2>
                    @if(!isset($movie))
                        {!! Form::open(['route' => 'movie.store', 'method'=> 'POST', 'enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route' => ['movie.update', $movie->id], 'method'=> 'PUT', 'enctype'=>'multipart/form-data']) !!}
                    @endif

                    {{--Title--}}
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tên Phim</label>
                        <div class="col-sm-9">
                            {!! Form::text('title', isset($movie) ? $movie->title : '',
                                ['class' => 'form-control',
                                'placeholder' => 'Nhập vào tên phim...',
                                'style' => 'width: 100%; color: white',
                                'id' => 'title',
                                'onkeyup'=>'ChangeToSlug()'])
                            !!}
                        </div>
                    </div>

                    {{--Name Original--}}
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tên Phim Gốc</label>
                        <div class="col-sm-9" style="color: #f0f0f0">
                            {!! Form::text('name_original', isset($movie) ? $movie->name_original : '',
                                ['class' => 'form-control',
                                'placeholder' => 'Nhập vào tên phim gốc...',
                                'style' => 'width: 100%; color: white',
                                'id' => 'name_ori'
                                ])
                            !!}
                        </div>
                    </div>

                    {{--Thoi Luong--}}
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Thời Lượng Phim</label>
                        <div class="col-sm-9">
                            {!! Form::text('ThoiLuong', isset($movie) ? $movie->ThoiLuong : '',
                                ['class' => 'form-control',
                                'placeholder' => 'Nhập vào thời lượng phim...',
                                'style' => 'width: 100%; color: white' ,
                                'id' => 'thoiluong'
                                ])
                            !!}
                        </div>
                    </div>

                    {{--So Tap Phim--}}
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Số Tập Phim</label>
                        <div class="col-sm-9">
                            {!! Form::text('SoTap', isset($movie) ? $movie->SoTap : '',
                                ['class' => 'form-control',
                                'placeholder' => 'Nhập vào số tập phim...',
                                'style' => 'width: 100%; color: white',
                                'id'=>'tapphim'
                                ])
                            !!}
                        </div>
                    </div>

                    {{--Slug--}}
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Đường Dẫn Phim</label>
                        <div class="col-sm-9">
                            {!! Form::text('slug', isset($movie) ? $movie->slug : '',
                                ['class' => 'form-control',
                                'placeholder' => 'Slug tên phim...',
                                'style' => 'width: 100%; color: white',
                                'id' => 'convert_slug'
                                ])
                            !!}
                        </div>
                    </div>

                    {{--Trailer--}}
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Trailer Phim</label>
                        <div class="col-sm-9">
                            {!! Form::text('trailer', isset($movie) ? $movie->trailer : '',
                                ['class' => 'form-control',
                                'placeholder' => 'Nhập vào trailer phim...',
                                'style' => 'width: 100%; color: white',
                                'id' => 'trailer'
                                ])
                            !!}
                        </div>
                    </div>

                    {{--Description--}}
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Mô Tả Phim</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('description', isset($movie) ? $movie->description : '',
                                ['class' => 'form-control',
                                'placeholder' => 'Nhập vào mô tả phim...',
                                'style' => 'resize: none; width: 100%; color: white',
                                'id' => 'description'
                                ])
                            !!}
                        </div>
                    </div>

                    {{--Tags--}}
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Tags Phim</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('tags', isset($movie) ? $movie->tags : '',
                                ['class' => 'form-control',
                                'placeholder' => 'Nhập vào tags phim...',
                                'style' => 'resize: none; width: 100%; color: white'
                                ])
                            !!}
                        </div>
                    </div>

                    {{--Category--}}
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Danh Mục Phim</label>
                        <div class="col-sm-9">
                            {!! Form::select('category_id', $category, isset($movie) ? $movie->category_id : '',
                                ['id' => 'select_category', 'class'=>'form-control', 'style'=>'color: white'])
                            !!}
                        </div>
                    </div>

                    {{--Thuoc The Loai Phim--}}
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Thuộc Thể Loại Phim</label>
                        <div class="col-sm-9">
                            {!! Form::select('ThuocPhim', ['phimle'=>'Phim Lẻ', 'phimbo'=>'Phim Bộ'], isset($movie) ? $movie->ThuocPhim : '',
                                ['class'=>'form-control', 'style'=>'color: white'])
                            !!}
                        </div>
                    </div>

                    {{--Genre--}}
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Thể Loại Phim</label>
                        <div class="col-sm-9">
                            <div class="row" style="margin-bottom: 10pt;" id="checked_genre">
                                <div class="col-md-4">
                                    @foreach($list_genre->take($list_genre->count()/3) as $gen)
                                        <div style="display: block;">
                                            @if(isset($movie))
                                                {!! Form::checkbox('genre[]', $gen->id, isset($movie_genre) && $movie_genre->contains($gen->id) ? true : false) !!}
                                            @else
                                                {!! Form::checkbox('genre[]', $gen->id, '') !!}
                                            @endif
                                            {!! Form::label('genre', $gen->title, ['style'=>'margin-top: 5px']) !!}
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-4">
                                    @foreach($list_genre->slice($list_genre->count()/3, $list_genre->count()/3) as $gen)
                                        <div style="display: block;">
                                            @if(isset($movie))
                                                {!! Form::checkbox('genre[]', $gen->id, isset($movie_genre) && $movie_genre->contains($gen->id) ? true : false) !!}
                                            @else
                                                {!! Form::checkbox('genre[]', $gen->id, '') !!}
                                            @endif
                                            {!! Form::label('genre', $gen->title, ['style'=>'margin-top: 5px']) !!}
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-4">
                                    @foreach($list_genre->slice(2 * $list_genre->count()/3) as $gen)
                                        <div style="display: block;">
                                            @if(isset($movie))
                                                {!! Form::checkbox('genre[]', $gen->id, isset($movie_genre) && $movie_genre->contains($gen->id) ? true : false) !!}
                                            @else
                                                {!! Form::checkbox('genre[]', $gen->id, '') !!}
                                            @endif
                                            {!! Form::label('genre', $gen->title, ['style'=>'margin-top: 5px']) !!}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--Country--}}
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Quốc Gia Phim</label>
                        <div class="col-sm-9">
                            {!! Form::select('country_id', $country, isset($movie) ? $movie->country_id: '',
                                ['class'=>'form-control', 'style'=>'color: white']) !!}
                        </div>
                    </div>

                    {{--Status--}}
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Trạng Thái Phim</label>
                        <div class="col-sm-9">
                            {!! Form::select('status', ['1'=>'Hiển Thị', '0'=>'Không Hiển Thị'], isset($movie) ? $movie->status : '',
                                ['class'=>'form-control', 'style'=>'color: white']) !!}
                        </div>
                    </div>

                    {{--Resolution--}}
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Định Dạng Phim</label>
                        <div class="col-sm-9">
                            {!! Form::select('resolution', ['0'=>'HD', '1'=>'SD', '2'=>'HDCam', '3'=>'Cam', '4'=>'FullHD', '5'=>'Trailer'], isset($movie) ? $movie->resolution : '',
                                ['class'=>'form-control', 'style'=>'color: white']) !!}
                        </div>
                    </div>

                    {{--Sub--}}
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Phụ Đề Phim</label>
                        <div class="col-sm-9">
                            {!! Form::select('phude', ['0'=>'Phụ Đề', '1'=>'Thuyết Minh'], isset($movie) ? $movie->phude : '',
                                ['class'=>'form-control', 'style'=>'color: white']) !!}
                        </div>
                    </div>

                    {{--Phim Hot--}}
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Phim Hot</label>
                        <div class="col-sm-9">
                            {!! Form::select('movie_hot', ['1'=>'Có', '0'=>'Không'], isset($movie) ? $movie->movie_hot : '',
                                ['class'=>'form-control', 'style'=>'color: white']) !!}
                        </div>
                    </div>

                    {{--Hình Ảnh Phim--}}
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Hình Ảnh Phim</label>
                        <div class="col-sm-9">
                            {!! Form::file('image', ['class'=>'form-control-file']) !!}

                            <div style="margin-bottom: 10pt;" id="choose_image">
                                @if(isset($movie))
                                    <img width="20%" src="{{ asset('uploads/movie/'.$movie->image) }}">
                                @else
                                @endif
                            </div>

                        </div>
                    </div>

                    <button id="submitBtn" type="button" class="btn btn-danger mr-2" onclick="return validateForm()">
                        @if(!isset($movie))
                            Thêm Mới
                        @else
                            Cập Nhật
                        @endif
                    </button>

                    <button class="btn btn-dark">Huỷ</button>

                    <!-- Confirm Modal -->
                    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="background-color: #191c24; color: white">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmModalLabel">Xác nhận thao tác</h5>
                                    <button type="button" class="mdi mdi-close" data-bs-dismiss="modal"
                                            style="background-color: #191c24; border: none; color: white"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="background-color: #191c24;">
                                    @if(!isset($movie))
                                        <p>Bạn có chắc chắn muốn thêm phim mới?</p>
                                    @else
                                        <p>Bạn có chắc chắn muốn cập nhật phim này?</p>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    {!! Form::submit(isset($movie) ? 'Cập Nhật' : 'Thêm Mới', ['class' => 'btn btn-danger']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Toasts  -->
                    <div class="toast-container position-fixed top-0 end-0 mt-5 me-5 ">
                        <div class="toast bg-gray-100 dark:bg-gray-900" role="alert" aria-live="assertive"
                             aria-atomic="true" data-bs-delay="5000">
                            <div class="toast-header bg-gray-100 dark:focus:bg-white d-flex align-items-center"
                                 style="background-color: red; border: none; color: white">
                                <i class="mdi mdi-alert-outline me-2"></i>
                                <strong class="me-auto">Thông báo</strong>
                                <button type="button" class="btn-close text-white" data-bs-dismiss="toast"
                                        aria-label="Close" style="color: white">
                                    <i class="mdi-close text-white" aria-hidden="true" style="color: white"></i>
                                </button>
                            </div>
                            <div class="toast-body">
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .error-input {
        border: 1px solid red;
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script>
    var toastLiveExample = document.getElementById('submitBtn')
    var toast = new bootstrap.Toast(document.querySelector('.toast'))

    function showToast() {
        toast.show()
    }

    function validateForm() {
        var title = document.getElementById("title").value;
        var nameOri = document.getElementById("name_ori").value;
        var thoiluong = document.getElementById("thoiluong").value;
        var tapphim = document.getElementById("tapphim").value;
        var slug = document.getElementById("convert_slug").value;
        var trailer = document.getElementById("trailer").value;
        var description = document.getElementById("description").value;
        var checkboxes = document.querySelectorAll('input[name="genre[]"]');
        var checked = false;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                checked = true;
                break;
            }
        }

        var imageInput = document.querySelector('input[name="image"]');
        var image = imageInput.files[0];

        if (title == "" && nameOri == "" && thoiluong == "" && tapphim == "" && slug == "" && trailer == "" && description == "" && !checked && !image) {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập đầy đủ thông tin."
            toast.show()

            var titleInput = document.getElementById("title");
            titleInput.style.border = "1px solid red";
            var nameOriInput = document.getElementById("name_ori");
            nameOriInput.style.border = "1px solid red";
            var thoiluongInput = document.getElementById("thoiluong");
            thoiluongInput.style.border = "1px solid red";
            var tapphimInput = document.getElementById("tapphim");
            tapphimInput.style.border = "1px solid red";
            var slugInput = document.getElementById("convert_slug");
            slugInput.style.border = "1px solid red";
            var trailerInput = document.getElementById("trailer");
            trailerInput.style.border = "1px solid red";
            var descriptionInput = document.getElementById("description");
            descriptionInput.style.border = "1px solid red";
            var checkedGenre = document.getElementById("checked_genre");
            checkedGenre.style.border = "1px solid red";
            var chooseImage = document.getElementById("choose_image");
            chooseImage.style.border = "1px solid red";

            setTimeout(function () {
                titleInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            setTimeout(function () {
                nameOriInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            setTimeout(function () {
                thoiluongInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            setTimeout(function () {
                tapphimInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            setTimeout(function () {
                slugInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            setTimeout(function () {
                trailerInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            setTimeout(function () {
                descriptionInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            setTimeout(function () {
                checkedGenre.style.border = ""; // Xóa viền đỏ
            }, 5000);
            setTimeout(function () {
                chooseImage.style.border = ""; // Xóa viền đỏ
            }, 5000);

            return false;
        } else if (title == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập tên phim."
            toast.show()

            var titleInput = document.getElementById("title");
            titleInput.style.border = "1px solid red";
            titleInput.focus();

            setTimeout(function () {
                titleInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            return false;
        } else if (nameOri == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập tên gốc phim."
            toast.show()

            var nameOriInput = document.getElementById("name_ori");
            nameOriInput.style.border = "1px solid red";
            nameOriInput.focus();

            setTimeout(function () {
                nameOriInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            return false;
        } else if (thoiluong == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập thời lượng phim."
            toast.show()

            var thoiluongInput = document.getElementById("thoiluong");
            thoiluongInput.style.border = "1px solid red";
            thoiluongInput.focus();

            setTimeout(function () {
                thoiluongInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            return false;
        } else if (tapphim == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập số tập phim."
            toast.show()

            var tapphimInput = document.getElementById("tapphim");
            tapphimInput.style.border = "1px solid red";
            tapphimInput.focus();

            setTimeout(function () {
                tapphimInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            return false;
        } else if (isNaN(tapphim)) {
            var toast = new bootstrap.Toast(document.querySelector('.toast'));
            var toastBody = document.querySelector('.toast-body');
            toastBody.innerText = "Vui lòng nhập số vào trường số tập phim này.";
            toast.show();

            var tapphimInput = document.getElementById("tapphim");
            tapphimInput.style.border = "1px solid red";
            tapphimInput.focus();

            setTimeout(function () {
                tapphimInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            return false;
        } else if (slug == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập đường dẫn phim."
            toast.show()

            var slugInput = document.getElementById("convert_slug");
            slugInput.style.border = "1px solid red";
            slugInput.focus();

            setTimeout(function () {
                slugInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            return false;
        } else if (trailer == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập trailer phim."
            toast.show()

            var trailerInput = document.getElementById("trailer");
            trailerInput.style.border = "1px solid red";
            trailerInput.focus();

            setTimeout(function () {
                trailerInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            return false;
        } else if (description == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập mô tả phim."
            toast.show()

            var descriptionInput = document.getElementById("description");
            descriptionInput.style.border = "1px solid red";
            descriptionInput.focus();

            setTimeout(function () {
                descriptionInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            return false;
        } else if (!checked) {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng chọn ít nhất 1 thể loại phim."
            toast.show()

            var checkedGenre = document.getElementById("checked_genre");
            checkedGenre.style.border = "1px solid red";
            checkedGenre.setAttribute("tabindex", "0");
            checkedGenre.focus();

            setTimeout(function () {
                checkedGenre.style.border = ""; // Xóa viền đỏ
            }, 5000);
            return false;
        } else if (!image) {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng tải lên hình phim."
            toast.show()

            var chooseImage = document.getElementById("choose_image");
            chooseImage.style.border = "1px solid red";
            chooseImage.focus();

            setTimeout(function () {
                chooseImage.style.border = ""; // Xóa viền đỏ
            }, 5000);
            return false;
        } else {
            $('#confirmModal').modal('show');
        }
        return true;
    }
</script>


