<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Danh Sách Phim') }}
        </h2>
        <a href="{{ route('movie.create') }}" class="btn btn-light" style="margin-top: 30px">Thêm Mới Phim</a>
    </x-slot>

    <div class="py-12 container-fluid">
        <div class="max-w-max mx-auto sm:px-6 lg:px-8"
             style="background-color: rgb(17 24 39 / var(--tw-bg-opacity)); color: black">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" text-gray-900 dark:text-gray-100 ">
                    <table class="table text-gray-900 dark:text-gray-100" id="tablePhim" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">Quản Lý</th>
                            <th scope="col">Hình Ảnh Phim</th>
                            <th scope="col">Tên Phim</th>
                            <th scope="col">Số Tập</th>
                            <th scope="col">Thêm Tập</th>
                            <th scope="col">Định Dạng</th>
                            <th scope="col">Phụ Đề</th>
                            <th scope="col">Danh Mục Phim</th>
                            <th scope="col">Thuộc</th>
                            <th scope="col">Quốc Gia Phim</th>
                            <th scope="col">Thể Loại Phim</th>
                            <th scope="col">Phim Hot</th>
                            <th scope="col">Năm Phim</th>
                            <th scope="col">Mùa Phim</th>
                            <th scope="col">Top Views</th>
                            <th scope="col">Tình Trạng</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($list as $key => $movie)
                            <tr>
                                {{--Quản Lý Phim--}}
                                <td>
                                    <button id="deleteBtn" type="button" class="btn btn-danger"
                                            onclick="showModal('{{ $movie->id }}')">
                                        Xoá
                                    </button>

                                    <a href="{{route('movie.edit', $movie->id)}}" class="btn btn-warning">Sửa</a>
                                </td>

                                {{--Hình Ảnh--}}
                                <td>
                                    <img width="80%" src="{{ asset('uploads/movie/'.$movie->image) }}">
                                    <input type="file" id="file-{{ $movie->id }}" data-movie_id="{{ $movie->id }}"
                                           class="form-control-file file_image" accept="image/*">
                                    <span id="success_image"></span>
                                </td>

                                {{--Tên Phim--}}
                                <td>{{$movie->title}}</td>

                                {{--Số Tập Phim--}}
                                <td>{{$movie->episode_count}}/{{$movie->SoTap}}</td>

                                {{--Tập Phim--}}
                                <td>
                                    <a href="{{ route('add-episode', [$movie->id]) }}" class="btn btn-success btn-sm">Thêm
                                        Tập Phim</a>
                                </td>

                                {{--Định Dạng Phim--}}
                                <td>
                                    @php
                                        $options = array('0'=>'HD', '1'=>'SD', '2'=>'HDCam', '3'=>'Cam', '4'=>'FullHD', '5'=>'Trailer');
                                    @endphp
                                    <select id="{{ $movie->id }}" class="form-control resolution_choose">
                                        @foreach($options as $key => $resolution)
                                            <option
                                                {{ $movie->resolution==$key ? 'selected' : '' }} value="{{ $key }}">{{ $resolution }}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td>
                                    <select id="{{ $movie->id }}" class="form-control phude_choose">
                                        @if ($movie->phude == 0)
                                            <option value="1">Thuyết Minh</option>
                                            <option selected value="0">Vietsub</option>
                                        @else
                                            <option selected value="1">Thuyết Minh</option>
                                            <option value="0">Vietsub</option>
                                        @endif
                                    </select>
                                </td>

                                {{--Danh Mục Phim--}}
                                <td>
                                    {!! Form::select('category_id', $category, isset($movie) ? $movie->category->id : '', ['class'=>'form-control category_choose', 'id'=>$movie->id]) !!}
                                </td>

                                {{--Thuộc Thể Loại Phim--}}
                                <td>
                                    <select id="{{ $movie->id }}" class="form-control thuocphim_choose">
                                        @if ($movie->ThuocPhim == 'phimbo')
                                            <option value="phimle">Phim Lẻ</option>
                                            <option selected value="phimbo">Phim Bộ</option>
                                        @else
                                            <option selected value="phimle">Phim Lẻ</option>
                                            <option value="phimbo">Phim Bộ</option>
                                        @endif
                                    </select>
                                </td>

                                {{--Quốc Gia Phim--}}
                                <td>
                                    {!! Form::select('country_id', $country, isset($movie) ? $movie->country->id : '', ['class'=>'form-control country_choose', 'id'=>$movie->id]) !!}
                                </td>

                                {{--Thể Loại Phim--}}
                                <td>
                                    @foreach($movie->movie_genre as $gen)
                                        <span class="badge badge-dark"
                                              style="background-color: #5a6870">{{$gen->title}}</span>
                                    @endforeach
                                </td>

                                {{--Phim Hot--}}
                                <td>
                                    <select id="{{ $movie->id }}" class="form-control phimhot_choose">
                                        @if ($movie->movie_hot == 0)
                                            <option value="1">Hot</option>
                                            <option selected value="0">Không</option>
                                        @else
                                            <option selected value="1">Hot</option>
                                            <option value="0">Không</option>
                                        @endif
                                    </select>
                                </td>

                                {{--Năm Phim--}}
                                <td>
                                    <div class="text-bg-light" style="width: 0px">
                                        {!! Form::selectYear('year', 2000, 2023, isset($movie->year) ? $movie->year : '', ['class'=>'select-year', 'id'=> $movie->id, 'style'=>'border-radius: 10px;', 'placeholder'=>'Năm']) !!}
                                    </div>
                                </td>

                                {{--Mùa Phim--}}
                                <td>
                                    <div class="text-bg-light" style="width: 0px">
                                        {!! Form::selectRange('season', 0, 20, isset($movie->season) ? $movie->season : '', ['class'=>'select-season', 'id'=> $movie->id, 'style'=>'border-radius: 10px']) !!}
                                    </div>
                                </td>

                                {{--Top Phim--}}
                                <td>
                                    <div class="text-bg-light" style="width: 0px">
                                        {!! Form::select('topview', ['0'=>'Ngày', '1'=>'Tuần', '2'=>'Tháng'], isset($movie) ? $movie->topview : '', ['class'=>'select-topview', 'id'=>$movie->id, 'style'=>'border-radius: 10px']) !!}
                                    </div>
                                </td>

                                {{--Tình Trạng--}}
                                <td>
                                    <select id="{{ $movie->id }}" class="form-control status_choose">
                                        @if ($movie->status == 0)
                                            <option value="1">Hiển Thị</option>
                                            <option selected value="0">Không Hiển Thị</option>
                                        @else
                                            <option selected value="1">Hiển Thị</option>
                                            <option value="0">Không Hiển Thị</option>
                                        @endif
                                    </select>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Confirm Modal -->
                <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-gray-100 dark:bg-gray-800 text-white">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmModalLabel">Xác nhận thao tác</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Bạn có chắc chắn muốn xoá danh mục phim này?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                {!! Form::open(['method'=>'DELETE', 'route'=>['movie.destroy', 'movieIdPlaceholder'], 'id'=>'deleteForm']) !!}
                                {!! Form::submit('Xoá', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function showModal(movieId) {
        $('#confirmModal').modal('show');
        $('#deleteForm').attr('action', '{{ route('movie.destroy', 'movieIdPlaceholder') }}'.replace('movieIdPlaceholder', movieId));
    }

    $(document).ready(function () {
        $('#tablePhim').DataTable();
    });
</script>
