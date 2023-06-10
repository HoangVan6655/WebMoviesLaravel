@extends('layouts.Admin.admin')

@section('content')

    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Liệt Kê Danh Sách Tập Phim</h2>

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
                    </style>

                    <div class="table-responsive">
                        <table class="table table-responsive text-gray-900 dark:text-gray-100" id="tableTapPhim">
                            <thead>
                            <tr>
                                <th></th>
                                <th scope="col"
                                    style="text-align: center; align-items: center; font-size: 20px; color: white; ">Tên
                                    Phim
                                </th>
                                <th scope="col"
                                    style="text-align: center; align-items: center; font-size: 20px; color: white; ">
                                    Hình Ảnh Phim
                                </th>
                                <th scope="col"
                                    style="text-align: center; align-items: center; font-size: 20px; color: white; ">Tập
                                    Phim
                                </th>
                                <th scope="col"
                                    style="text-align: center; align-items: center; font-size: 20px; color: white; ">
                                    Link Phim
                                </th>
                                <th scope="col"
                                    style="text-align: center; align-items: center; font-size: 20px; color: white; ">
                                    Quản lý
                                </th>
                            </tr>
                            </thead>
                            <tbody style="color: white">
                            @foreach($list_episode as $key => $episode)
                                <tr>
                                    <th scope="row">{{$key + 1}}</th>
                                    <td>{{$episode->movie->title}}</td>
                                    <td><img width="100%" style="width: 150px; height: 250px; "
                                             src="{{ asset('uploads/movie/'.$episode->movie->image) }}">
                                    </td>
                                    <td>{{$episode->episode}}</td>
                                    <td class="iframe_phim"
                                        style="max-width: 100%; white-space:pre-wrap; word-wrap:break-word">{{ $episode->linkphim }}</td>
                                    <td>
                                        <button id="submitBtn" type="button" class="btn btn-danger"
                                                onclick="showModal({{ $episode->id }})">
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
                    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel"
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

<script>
    function showModal(episodeId) {
        $('#confirmModal').data('id', episodeId);
        var formAction = "{{ route('episode.destroy', '') }}";
        formAction += "/" + episodeId;
        $('#confirmModal form').attr('action', formAction);
        $('#confirmModal').modal('show');
    }
</script>
