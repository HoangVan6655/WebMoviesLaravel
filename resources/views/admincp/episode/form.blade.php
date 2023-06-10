@extends('layouts.Admin.admin')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Thêm Mới Tập Phim</h2>
                    @if(!isset($episode))
                        {!! Form::open(['route' => 'episode.store', 'method'=> 'POST', 'enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route' => ['episode.update', $episode->id], 'method'=> 'PUT', 'enctype'=>'multipart/form-data']) !!}
                    @endif
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tên Phim</label>
                        <div class="col-sm-9" style="color: white">
                            {!! Form::select('movie_id', ['0'=>'Chọn Phim', 'Phim'=>$list_movie], isset($episode) ? $episode->movie_id : '', ['class'=>'form-control select-movie', 'style'=>'color: white', 'id'=>'movie-select']) !!}
                        </div>
                    </div>
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Đường Dẫn Tập Phim</label>
                        <div class="col-sm-9" style="color: white">
                            {!! Form::text('link', isset($episode) ? $episode->linkphim : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào link phim...', 'style' => 'width: 100%; color: black; color: white', 'id'=>'linkepisode']) !!}
                        </div>
                    </div>
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Chọn Tập Phim</label>
                        <div class="col-sm-9" id="episodeChoose">
                            @if(isset($episode))
                                {!! Form::text('episode', isset($episode) ? $episode->episode : '',
                                    ['class' => 'form-control', 'placeholder' => 'Nhập vào tập phim...', 'style' => 'width: 100%; color: white; background-color: #191c24',
                                    isset($episode) ? 'readonly' : '', 'id'=>'episode-movie']) !!}
                            @else
                                <select name="episode" class="form-control"
                                        style="display: flex; color: white"
                                        id="show_movie">
                                </select>
                            @endif
                        </div>
                    </div>
                    <button id="submitBtn" type="button" class="btn btn-danger mr-2" onclick="return validateForm()">
                        @if(!isset($episode))
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
                                            aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body" style="background-color: #191c24;">
                                    @if(!isset($episode))
                                        <p>Bạn có chắc chắn muốn thêm tập phim mới?</p>
                                    @else
                                        <p>Bạn có chắc chắn muốn cập nhật tập phim này?</p>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    {!! Form::submit(isset($episode) ? 'Cập Nhật' : 'Thêm Mới', ['class' => 'btn btn-danger']) !!}
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
        var link = document.getElementById("linkepisode").value;
        var movieSelect = document.getElementById("movie-select").value;
        var episodeSelect = document.getElementById("show_movie").value;

        if (link == "" && movieSelect == "0" && episodeSelect == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập đầy đủ thông tin."
            toast.show()

            var linkInput = document.getElementById("linkepisode");
            linkInput.style.border = "1px solid red";
            var movieSelectInput = document.getElementById("movie-select");
            movieSelectInput.style.border = "1px solid red";
            var episodeChooseInput = document.getElementById("episodeChoose");
            episodeChooseInput.style.border = "1px solid red";

            setTimeout(function () {
                linkInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            setTimeout(function () {
                movieSelectInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            setTimeout(function () {
                episodeChooseInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            return false;
        } else if (link == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập link phim."
            toast.show()

            var linkInput = document.getElementById("linkepisode");
            linkInput.style.border = "1px solid red";
            linkInput.focus();

            setTimeout(function () {
                linkInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            return false;
        } else if (movieSelect == "0") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng chọn phim."
            toast.show()

            var movieSelectInput = document.getElementById("movie-select");
            movieSelectInput.style.border = "1px solid red";
            movieSelectInput.focus();

            setTimeout(function () {
                movieSelectInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            return false;
        } else if (episodeSelect == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng chọn tập phim."
            toast.show()

            var episodeChooseInput = document.getElementById("episodeChoose");
            episodeChooseInput.style.border = "1px solid red";
            episodeChooseInput.focus();

            setTimeout(function () {
                episodeChooseInput.style.border = ""; // Xóa viền đỏ
            }, 5000);
            return false;
        } else {
            $('#confirmModal').modal('show');
        }
    }
</script>


