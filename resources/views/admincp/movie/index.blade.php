@extends('layouts.Admin.admin')

@section('content')
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Liệt Kê Danh Sách Phim</h2>

                    <style>
                        #tablePhim_length label {
                            font-size: 0;
                        }

                        #tablePhim_length select {
                            color: white;
                        }

                        #tablePhim_filter label {
                            display: flex;
                            align-items: center;
                        }

                        #tablePhim_filter input[type="search"] {
                            width: 400px;
                            color: white;
                        }

                        #tablePhim_filter label span {
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
                        <table class="table text-gray-900 dark:text-gray-100" id="tablePhim" style="width: 100%;">
                            <thead>
                            <tr>
                                <th style="color: white"></th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Ngày
                                    Thêm Phim
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Ngày
                                    Cập Nhật Phim
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Hình
                                    Ảnh Phim
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Tên
                                    Của Phim
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Tên
                                    Phim Gốc
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Thời
                                    Lượng Phim
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Mô
                                    Tả Tóm Tắt Phim
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Tổng
                                    Số Tập Phim
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Thêm
                                    Tập Phim
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Tags
                                    Của Phim
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Định
                                    Dạng Phim
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Phụ
                                    Đề Phim
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Danh
                                    Mục Phim
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center">
                                    Thuộc Thể Loại Phim
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Quốc
                                    Gia Phim
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Thể
                                    Loại Phim
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Phim
                                    Hot
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Năm
                                    Phim
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center">
                                    Season Phim
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Top
                                    Views
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Tình
                                    Trạng Hiển Thị Phim
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center">
                                    Đường Dẫn Phim
                                </th>
                                <th style="color: white; font-size: 20px; align-items: center; text-align: center"> Quản
                                    Lý
                                </th>
                            </tr>
                            </thead>
                            <tbody style="color: white">
                            @foreach($list as $key => $movie)
                                <tr>
                                    <th style="color: white; align-items: center; text-align: center">{{ $key+1 }}</th>
                                    {{--Ngày Thêm Phim--}}
                                    <th style="color: white; align-items: center; text-align: center">{{ $movie->NgayTao }}</th>

                                    {{--Ngày Cập Nhật Phim--}}
                                    <th style="color: white; align-items: center; text-align: center">{{ $movie->NgayCapNhat }}</th>

                                    {{--Hình Ảnh--}}
                                    <td style="width: 100%; align-items: center; text-align: center">
                                        <img style="width: 120px; height: 160px; "
                                             src="{{ asset('uploads/movie/'.$movie->image) }}">
                                        <input type="file" id="file-{{ $movie->id }}" data-movie_id="{{ $movie->id }}"
                                               class="form-control-file file_image" accept="image/*">
                                        <span id="success_image"></span>
                                    </td>

                                    {{--Tên Phim--}}
                                    <td style="color: white; align-items: center; text-align: center; white-space:pre-wrap; word-wrap:break-word">
                                        {{$movie->title}}
                                    </td>

                                    {{--Tên Phim Gốc--}}
                                    <td style="color: white; align-items: center; text-align: center; white-space:pre-wrap; word-wrap:break-word">
                                        {{$movie->name_original}}
                                    </td>

                                    {{--Thời Lượng phim--}}
                                    <td style="color: white; align-items: center; text-align: center;">
                                        {{$movie->ThoiLuong}}
                                    </td>

                                    {{--Mô tả phim--}}
                                    <td style="color: white; align-items: center; text-align: center; white-space:inherit; word-wrap:break-word">
                                        {{$movie->description}}
                                    </td>

                                    {{--Số Tập Phim--}}
                                    <td style="color: white; align-items: center; text-align: center;">
                                        {{$movie->episode_count}}/{{$movie->SoTap}}
                                    </td>

                                    {{--Tập Phim--}}
                                    <td style="color: white; align-items: center; text-align: center;">
                                        <a href="{{ route('add-episode', [$movie->id]) }}"
                                           class="btn btn-success btn-sm">Thêm Tập</a>
                                    </td>

                                    {{--Tags--}}
                                    <td style="color: white; align-items: center; text-align: center; white-space:pre-wrap; word-wrap:break-word">
                                        {{ $movie->tags }}
                                    </td>

                                    {{--Định Dạng Phim--}}
                                    <td style="">
                                        <div style="display: flex; align-items: center; justify-content: center;">
                                            @php
                                                $options = array('0'=>'HD', '1'=>'SD', '2'=>'HDCam', '3'=>'Cam', '4'=>'FullHD', '5'=>'Trailer');
                                            @endphp
                                            <select id="{{ $movie->id }}" class="form-control resolution_choose"
                                                    style="width: 100px; color: white">
                                                @foreach($options as $key => $resolution)
                                                    <option
                                                        {{ $movie->resolution==$key ? 'selected' : '' }} value="{{ $key }}">{{ $resolution }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>

                                    {{--Phụ Đề Phim--}}
                                    <td>
                                        <div style="display: flex; align-items: center; justify-content: center;">
                                            <select id="{{ $movie->id }}" class="form-control phude_choose"
                                                    style="color: white;">
                                                @if ($movie->phude == 0)
                                                    <option value="1">Thuyết Minh</option>
                                                    <option selected value="0">Vietsub</option>
                                                @else
                                                    <option selected value="1">Thuyết Minh</option>
                                                    <option value="0">Vietsub</option>
                                                @endif
                                            </select>
                                        </div>
                                    </td>

                                    {{--Danh Mục Phim--}}
                                    <td>
                                        <div style="display: flex; align-items: center; justify-content: center;">
                                            {!! Form::select('category_id', $category, isset($movie) ? $movie->category->id : '', ['class'=>'form-control category_choose', 'id'=>$movie->id, 'style'=>'color: white']) !!}
                                        </div>
                                    </td>

                                    {{--Thuộc Thể Loại Phim--}}
                                    <td>
                                        <div style="display: flex; align-items: center; justify-content: center;">
                                            <select id="{{ $movie->id }}" class="form-control thuocphim_choose"
                                                    style="color:white; width: 100px">
                                                @if ($movie->ThuocPhim == 'phimbo')
                                                    <option value="phimle">Phim Lẻ</option>
                                                    <option selected value="phimbo">Phim Bộ</option>
                                                @else
                                                    <option selected value="phimle">Phim Lẻ</option>
                                                    <option value="phimbo">Phim Bộ</option>
                                                @endif
                                            </select>
                                        </div>
                                    </td>

                                    {{--Quốc Gia Phim--}}
                                    <td>
                                        <div style="display: flex; align-items: center; justify-content: center;">
                                            {!! Form::select('country_id', $country, isset($movie) ? $movie->country->id : '', ['class'=>'form-control country_choose', 'id'=>$movie->id, 'style'=>'color: white; width: 150px']) !!}
                                        </div>
                                    </td>

                                    {{--Thể Loại Phim--}}
                                    <td>
                                        <div
                                            style="display: flex; align-items: center; justify-content: center; flex-wrap: wrap;">
                                            @foreach($movie->movie_genre as $gen)
                                                <span class="badge badge-dark"
                                                      style="background-color: #5a6870; margin-bottom: 5px;">{{$gen->title}}</span>
                                            @endforeach
                                        </div>
                                    </td>

                                    {{--Phim Hot--}}
                                    <td>
                                        <div style="display: flex; align-items: center; justify-content: center;">
                                            <select id="{{ $movie->id }}" class="form-control phimhot_choose"
                                                    style="color: white; width: 100px">
                                                @if ($movie->movie_hot == 0)
                                                    <option value="1">Hot</option>
                                                    <option selected value="0">Không</option>
                                                @else
                                                    <option selected value="1">Hot</option>
                                                    <option value="0">Không</option>
                                                @endif
                                            </select>
                                        </div>
                                    </td>

                                    {{--Năm Phim--}}
                                    <td>
                                        <div style="display: flex; align-items: center; justify-content: center;">
                                            {!! Form::selectYear('year', 2000, 2023, isset($movie->year) ? $movie->year : '', ['class'=>'select-year', 'id'=> $movie->id, 'style'=>'border-radius: 2px; color: white; width: 100px', 'placeholder'=>'Năm']) !!}
                                        </div>
                                    </td>

                                    {{--Mùa Phim--}}
                                    <td>
                                        <div style="display: flex; align-items: center; justify-content: center;">
                                            {!! Form::selectRange('season', 0, 20, isset($movie->season) ? $movie->season : '', ['class'=>'select-season', 'id'=> $movie->id, 'style'=>'border-radius: 2px; color: white; width: 100px']) !!}
                                        </div>
                                    </td>

                                    {{--Top Phim--}}
                                    <td>
                                        <div style="display: flex; align-items: center; justify-content: center;">
                                            {!! Form::select('topview', ['0'=>'Ngày', '1'=>'Tuần', '2'=>'Tháng'], isset($movie) ? $movie->topview : '', ['class'=>'select-topview', 'id'=>$movie->id, 'style'=>'border-radius: 2px; color: white; width: 100px']) !!}
                                        </div>
                                    </td>

                                    {{--Tình Trạng--}}
                                    <td>
                                        <div style="display: flex; align-items: center; justify-content: center;">
                                            <select id="{{ $movie->id }}" class="form-control status_choose"
                                                    style="color: white; width: 200px">
                                                @if ($movie->status == 0)
                                                    <option value="1">Hiển Thị</option>
                                                    <option selected value="0">Không Hiển Thị</option>
                                                @else
                                                    <option selected value="1">Hiển Thị</option>
                                                    <option value="0">Không Hiển Thị</option>
                                                @endif
                                            </select>
                                        </div>
                                    </td>

                                    {{--slug--}}
                                    <td>
                                        {{ $movie->slug }}
                                    </td>

                                    {{--Quản Lý Phim--}}
                                    <td>
                                        <button id="deleteBtn" type="button" class="btn btn-danger"
                                                onclick="showModal('{{ $movie->id }}')">
                                            Xoá
                                        </button>

                                        <a href="{{route('movie.edit', $movie->id)}}" class="btn btn-warning">Sửa</a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Confirm Modal -->
                <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel"
                     aria-hidden="true" data-id="{{ isset($movie) ? $movie->id : '' }}">
                    <div class="modal-dialog">
                        <div class="modal-content bg-gray-100 dark:bg-gray-800 text-white">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmModalLabel">Xác nhận thao tác</h5>
                                <button type="button" class="mdi mdi-close" data-bs-dismiss="modal"
                                        aria-label="Close"
                                        style="background-color: #191c24; border: none; color: white"></button>
                            </div>
                            <div class="modal-body">
                                <p>Bạn có chắc chắn muốn xoá phim này?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                {!! Form::open(['method'=>'DELETE', 'route'=>['movie.destroy', '__movieId']]) !!}
                                {!! Form::submit('Xoá', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
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
        $('#tablePhim').DataTable();
    });
</script>

<script>
    function showModal(movieId) {
        $('#confirmModal').data('id', movieId);
        var formAction = "{{ route('movie.destroy', '') }}";
        formAction += "/" + movieId;
        $('#confirmModal form').attr('action', formAction);
        $('#confirmModal').modal('show');
    }
</script>
