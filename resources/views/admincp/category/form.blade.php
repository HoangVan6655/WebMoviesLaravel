@extends('layouts.Admin.admin')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thêm Mới Danh Mục Phim</h4>
                    <form class="forms-sample">
                        @if(!isset($category))
                            {!! Form::open(['route' => 'category.store', 'method'=> 'POST']) !!}
                        @else
                            {!! Form::open(['route' => ['category.update', $category->id], 'method'=> 'PUT']) !!}
                        @endif
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tên Danh Mục Phim</label>
                            <div class="col-sm-9">
                                {!! Form::text('title', isset($category) ? $category->title : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào tên danh mục...', 'style' => 'width: 100%;', 'id' => 'title', 'onkeyup'=>'ChangeToSlug()']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Đường Dẫn Danh Mục
                                Phim</label>
                            <div class="col-sm-9" style="color: #f0f0f0">
                                {!! Form::text('slug', isset($category) ? $category->slug : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào đường dẫn danh mục...', 'style' => 'width: 100%;', 'id' => 'convert_slug']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mô Tả Danh Mục Phim</label>
                            <div class="col-sm-9">
                                {!! Form::textarea('description', isset($category) ? $category->description : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào mô tả danh mục...', 'style' => 'resize: none; width: 100%;', 'id' => 'description']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Tình Trạng Danh Mục
                                Phim</label>
                            <div class="col-sm-9">
                                {!! Form::select('status', ['1'=>'Hiển Thị', '0'=>'Không Hiển Thị'], isset($category) ? $category->status : '', ['class'=>'form-control', 'style'=>'color: white' ]) !!}
                            </div>
                        </div>
                        <button id="submitBtn" type="button" class="btn btn-danger mr-2"
                                onclick="return validateForm()">
                            @if(!isset($category))
                                Thêm Mới
                            @else
                                Cập Nhật
                            @endif
                        </button>

                        <button class="btn btn-dark">Huỷ</button>
                        {!! Form::close() !!}

                    </form>

                    <!-- Confirm Modal -->
                    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="background-color: #191c24">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmModalLabel">Xác nhận thao tác</h5>
                                    <button type="button" class="mdi mdi-close" data-bs-dismiss="modal"
                                            style="background-color: #191c24; border: none; color: white"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @if(!isset($category))
                                        <p>Bạn có chắc chắn muốn thêm danh mục mới?</p>
                                    @else
                                        <p>Bạn có chắc chắn muốn cập nhật danh mục này?</p>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    {!! Form::submit(isset($category) ? 'Cập Nhật' : 'Thêm Mới', ['class' => 'btn btn-success', 'onclick' => 'showToastSuccess()']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Toasts  -->
                    <div class="toast-container position-fixed top-0 end-0 mt-5 me-5 ">
                        <div class="toast bg-gray-100 dark:bg-gray-900" role="alert" aria-live="assertive"
                             aria-atomic="true" data-bs-delay="5000">
                            <div class="toast-header bg-gray-100 dark:focus:bg-white d-flex align-items-center">
                                <i class="fa fa-warning me-2"></i>
                                <strong class="me-auto">Thông báo</strong>
                                <button type="button" class="btn-close text-dark" data-bs-dismiss="toast"
                                        aria-label="Close" style="">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="toast-body">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    var toastLiveExample = document.getElementById('submitBtn')
    var toast = new bootstrap.Toast(document.querySelector('.toast'))

    function showToast() {
        toast.show()
    }

    function validateForm() {
        var title = document.getElementById("title").value;
        var description = document.getElementById("description").value;
        if (title == "" && description == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập đầy đủ thông tin."
            toast.show()
            return false;
        } else if (title == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập tên danh mục."
            toast.show()
            return false;
        } else if (description == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập mô tả danh mục."
            toast.show()
            return false;
        } else {
            $('#confirmModal').modal('show');
        }
    }
</script>

