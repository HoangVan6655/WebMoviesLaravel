@extends('layouts.Admin.admin')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if(!isset($genre))
                        <h2 class="card-title">Thêm Mới Thể Loại Phim</h2>
                    @else
                        <h2 class="card-title">Cập Nhật Thể Loại Phim</h2>
                    @endif
                    @if(!isset($genre))
                        {!! Form::open(['route' => 'genre.store', 'method'=> 'POST']) !!}
                    @else
                        {!! Form::open(['route' => ['genre.update', $genre->id], 'method'=> 'PUT']) !!}
                    @endif
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tên Thể Loại</label>
                        <div class="col-sm-9">
                            {!! Form::text('title', isset($genre) ? $genre->title : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào tên thể loại...', 'style' => 'width: 100%;', 'id' => 'title', 'onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                    </div>
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Đường Dẫn Thể Loại</label>
                        <div class="col-sm-9" style="color: #f0f0f0">
                            {!! Form::text('slug', isset($genre) ? $genre->slug : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào đường dẫn thể loại...', 'style' => 'width: 100%;', 'id' => 'convert_slug']) !!}
                        </div>
                    </div>
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mô Tả Thể Loại</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('description', isset($genre) ? $genre->description : '', ['class' => 'ckeditor form-control', 'placeholder' => 'Nhập vào mô tả thể loại...', 'style' => 'resize: none; width: 100%;', 'id' => 'description']) !!}
                        </div>
                    </div>
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Tình Trạng Thể Loại</label>
                        <div class="col-sm-9">
                            {!! Form::select('status', ['1'=>'Hiển Thị', '0'=>'Không Hiển Thị'], isset($genre) ? $genre->status : '', ['class'=>'form-control', 'style'=>'color: white' ]) !!}
                        </div>
                    </div>
                    <button id="submitBtn" type="button" class="btn btn-danger mr-2" onclick="return validateForm()">
                        @if(!isset($genre))
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
                                    @if(!isset($genre))
                                        <p>Bạn có chắc chắn muốn thêm thể loại mới?</p>
                                    @else
                                        <p>Bạn có chắc chắn muốn cập nhật thể loại này?</p>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    {!! Form::submit(isset($genre) ? 'Cập Nhật' : 'Thêm Mới', ['class' => 'btn btn-danger']) !!}
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
                                    <i class="mdi-close text-white" aria-hidden="true"></i>
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
        var slug = document.getElementById("convert_slug").value;
        var description = document.getElementById("description").value;

        if (title == "" && slug == "" && description == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập đầy đủ thông tin."
            toast.show()

            var titleInput = document.getElementById("title");
            titleInput.style.border = "1px solid red";
            var slugInput = document.getElementById("convert_slug");
            slugInput.style.border = "1px solid red";
            var descriptionInput = document.getElementById("description");
            descriptionInput.style.border = "1px solid red";

            setTimeout(function () {
                titleInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            setTimeout(function () {
                slugInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            setTimeout(function () {
                descriptionInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            return false;
        } else if (title == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập tên thể loại."
            toast.show()

            var titleInput = document.getElementById("title");
            titleInput.style.border = "1px solid red";
            titleInput.focus();

            setTimeout(function () {
                titleInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            return false;
        } else if (slug == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập đường dẫn thể loại."
            toast.show()

            var slugInput = document.getElementById("convert_slug");
            slugInput.style.border = "1px solid red";
            slugInput.focus();

            setTimeout(function () {
                slugInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            return false;
        } else if (description == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập mô tả thể loại."
            toast.show()

            var descriptionInput = document.getElementById("description");
            descriptionInput.style.border = "1px solid red";
            descriptionInput.focus();

            setTimeout(function () {
                descriptionInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            return false;
        } else {
            $('#confirmModal').modal('show');
        }
    }
</script>

