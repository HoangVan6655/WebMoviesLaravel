@extends('layouts.Admin.admin')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Thêm Mới Tập Phim - {{$movie->title}} </h2>
                    @if(!isset($episode))
                        {!! Form::open(['route' => 'episode.store', 'method'=> 'POST', 'enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route' => ['episode.update', $episode->id], 'method'=> 'PUT', 'enctype'=>'multipart/form-data']) !!}
                    @endif
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tên Phim</label>
                        <div class="col-sm-9" style="color: white">
                            {!! Form::text('movie_title', isset($movie) ? $movie->title : '',
                                ['class' => 'form-control', 'style' => 'width: 100%; background-color: #191c24; color: white', 'readonly']) !!}
                            {!! Form::hidden('movie_id', isset($movie) ? $movie->id : '') !!}
                        </div>
                    </div>
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Đường Dẫn Tập Phim</label>
                        <div class="col-sm-9" style="color: white">
                            {!! Form::text('link', isset($episode) ? $episode->linkphim : '',
                                ['class' => 'form-control', 'placeholder' => 'Nhập vào link phim...', 'style' => 'width: 100%; color: white', 'id'=>'linkepisode']) !!}
                        </div>
                    </div>
                    <div class="form-group row" style="color: white">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Chọn Tập Phim</label>
                        <div class="col-sm-9">
                            @if(isset($episode))
                                {!! Form::text('episode', isset($episode) ? $episode->episode : '',
                                    ['class' => 'form-control', 'placeholder' => 'Nhập vào tập phim...', 'style' => 'width: 100%; color: white',
                                    isset($episode) ? 'readonly' : '']) !!}
                            @else
                                @if ($movie->ThuocPhim == 'phimbo')
                                    {!! Form::selectRange('episode', 1, $movie->SoTap, $movie->SoTap, ['class' => 'form-control', 'style' => 'color: white']) !!}
                                @else
                                    {!! Form::select('episode', [
                                        'HD' => 'HD',
                                        'FullHD' => 'FullHD',
                                        'Cam' => 'Cam',
                                        'HDCam' => 'HDCam',
                                    ], isset($movie) ? $movie->episode : null, ['class' => 'form-control', 'style' => 'color: white']) !!}
                                @endif
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

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Liệt Kê Danh Sách Tập Phim - {{ $movie->title }}</h2>

                    <style>
                        #tableTapPhim_length label {
                            font-size: 0;
                        }

                        #tableTapPhim_length select {
                            color: white;
                        }

                        #tableTapPhim_filter label {
                            display: flex;
                            align-items: center;
                        }

                        #tableTapPhim_filter input[type="search"] {
                            width: 400px;
                            color: white;
                        }

                        #tableTapPhim_filter label span {
                            display: none;

                        }

                        .dataTables_wrapper .dataTable thead .sorting:before,
                        .dataTables_wrapper .dataTable thead .sorting_asc:before,
                        .dataTables_wrapper .dataTable thead .sorting_desc:before,
                        .dataTables_wrapper .dataTable thead .sorting_asc_disabled:before,
                        .dataTables_wrapper .dataTable thead .sorting_desc_disabled:before {
                            position: absolute;
                            right: 2px;
                            font-weight: 900;
                        }

                        .dataTables_wrapper .dataTables_filter {
                            color: white;
                        }

                        .paginate_button.current, .dataTables_wrapper {
                            color: white !important;
                        }

                        .dataTables_wrapper .dataTables_paginate
                        .paginate_button.disabled, .dataTables_wrapper
                        .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper
                        .dataTables_paginate .paginate_button.disabled:active {
                            color: white !important;
                        }
                    </style>

                    <div class="table-responsive">
                        <table class="table table-responsive text-gray-900 dark:text-gray-100" id="tableTapPhim">
                            <thead>
                            <tr>
                                <th style="background-color: #191c24"></th>
                                <th scope="col"
                                    style="text-align: center; align-items: center; font-size: 20px; color: white; background-color: #191c24">
                                    Tên Phim
                                </th>
                                <th scope="col"
                                    style="text-align: center; align-items: center; font-size: 20px; color: white; background-color: #191c24 ">
                                    Hình Ảnh Phim
                                </th>
                                <th scope="col"
                                    style="text-align: center; align-items: center; font-size: 20px; color: white; background-color: #191c24">
                                    Tập Phim
                                </th>
                                <th scope="col"
                                    style="text-align: center; align-items: center; font-size: 20px; color: white; background-color: #191c24">
                                    Link Phim
                                </th>
                                <th scope="col"
                                    style="text-align: center; align-items: center; font-size: 20px; color: white; background-color: #191c24">
                                    Quản lý
                                </th>
                            </tr>
                            </thead>
                            <tbody style="color: white">
                            @foreach($list_episode as $key => $episode)
                                <tr>
                                    <th scope="row"
                                        style="background-color: #191c24; color: white; align-items: center; text-align: center;">{{$key + 1}}</th>
                                    <td style="background-color: #191c24; color: white; align-items: center; text-align: center;">{{$episode->movie->title}}</td>
                                    <td style="background-color: #191c24; align-items: center; text-align: center;">
                                        <img width="100%" style="width: 150px; height: 250px; text-align: center;"
                                             src="{{ asset('uploads/movie/'.$episode->movie->image) }}">
                                    </td>
                                    <td style="background-color: #191c24; color: white; text-align: center; align-items: center">{{$episode->episode}}</td>
                                    <td class="iframe_phim"
                                        style="max-width: 100%; white-space:inherit; word-wrap:break-word; background-color: #191c24; color: white; text-align: center; align-items: center">
                                        {{ $episode->linkphim }}
                                    </td>
                                    <td style="background-color: #191c24; text-align: center; align-items: center">
                                        <button id="submitBtn" type="button" class="btn btn-danger"
                                                onclick="showModalDelete({{ $episode->id }})">
                                            Xoá
                                        </button>

                                        <a href="{{route('episode.edit', $episode->id)}}"
                                           class="btn btn-warning">Sửa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Confirm Modal -->
                    <div class="modal fade" id="confirmModalDelete" tabindex="-1" aria-labelledby="confirmModalLabel"
                         aria-hidden="true" data-id="{{ isset($episode) ? $episode->id : '' }}">
                        <div class="modal-dialog">
                            <div class="modal-content bg-gray-100 dark:bg-gray-800 text-white">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmModalLabel">Xác nhận thao tác</h5>
                                    <button type="button" class="mdi mdi-close" data-bs-dismiss="modal"
                                            aria-label="Close"
                                            style="background-color: #191c24; border: none; color: white"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Bạn có chắc chắn muốn xoá tập phim này?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    {!! Form::open(['method'=>'DELETE', 'route'=>['episode.destroy', '__episodeId']]) !!}
                                    {!! Form::submit('Xoá', ['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#tableTapPhim').DataTable();
    });
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script>
    var toastLiveExample = document.getElementById('submitBtn')
    var toast = new bootstrap.Toast(document.querySelector('.toast'))

    function validateForm() {
        var link = document.getElementById("linkepisode").value;

        if (link == "") {
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
        } else {
            $('#confirmModal').modal('show');
        }
    }
</script>

<script>
    function showModalDelete(episodeId) {
        console.log(episodeId);
        $('#confirmModalDelete').data('id', episodeId);
        var formAction = "{{ route('episode.destroy', '') }}";
        formAction += "/" + episodeId;
        $('#confirmModalDelete form').attr('action', formAction);
        $('#confirmModalDelete').modal('show');
    }
</script>
