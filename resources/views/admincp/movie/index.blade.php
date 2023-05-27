<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Danh Sách Phim') }}
        </h2>
        <a href="{{ route('movie.create') }}" class="btn btn-light" style="margin-top: 30px">Thêm Mới Phim</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-max mx-auto sm:px-6 lg:px-8"
             style="background-color: rgb(17 24 39 / var(--tw-bg-opacity)); color: black">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">
                    <table class="table text-gray-900 dark:text-gray-100" id="tablePhim">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Hình Ảnh Phim abc</th>
                            <th scope="col">Tên Phim</th>
                            <th scope="col">Định Dạng</th>
                            <th scope="col">Danh Mục Phim</th>
                            <th scope="col">Thể Loại Phim</th>
                            <th scope="col">Quốc Gia Phim</th>
                            <th scope="col">Phim Hot</th>
                            <th scope="col">Năm Phim</th>
                            <th scope="col">Mùa Phim</th>
                            <th scope="col">Top Views</th>

                            <th scope="col">Quản Lý</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $key => $movie)
                            <tr>
                                {{--STT--}}
                                <th scope="row">{{$key}}</th>
                                {{--Hình Ảnh--}}
                                <td><img width="80%" src="{{ asset('uploads/movie/'.$movie->image) }}"></td>
                                {{--Tên Phim--}}
                                <td>{{$movie->title}}</td>
                                {{--Định Dạng Phim--}}
                                <td>
                                    @if($movie->resolution == 0)
                                        HD
                                    @elseif($movie->resolution == 1)
                                        SD
                                    @elseif($movie->resolution == 2)
                                        HDCam
                                    @elseif($movie->resolution == 3)
                                        Cam
                                    @elseif($movie->resolution == 4)
                                        FullHD
                                    @else
                                        Trailer
                                    @endif
                                </td>
                                {{--Danh Mục Phim--}}
                                <td>{{$movie->category->title}}</td>
                                {{--Thể Loại Phim--}}
                                <td>{{$movie->genre->title}}</td>
                                {{--Quốc Gia Phim--}}
                                <td>{{$movie->country->title}}</td>
                                {{--Phim Hot--}}
                                <td>
                                    @if($movie->movie_hot)
                                        Có
                                    @else
                                        Không
                                    @endif
                                </td>
                                {{--Năm Phim--}}
                                <td>
                                    <div class="text-bg-light" style="width: 0px">
                                        {!! Form::selectYear('year', 2000, 2023, isset($movie->year) ? $movie->year : '', ['class'=>'select-year', 'id'=> $movie->id, 'style'=>'border-radius: 10px']) !!}
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
