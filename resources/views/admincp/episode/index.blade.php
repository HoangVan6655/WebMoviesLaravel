<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Danh Sách Tập Phim') }}
        </h2>
        <a href="{{ route('episode.create') }}" class="btn btn-light" style="margin-top: 30px">Thêm Mới Tập Phim</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"
             style="background-color: rgb(17 24 39 / var(--tw-bg-opacity)); color: black">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">
                    <table class="table table-responsive text-gray-900 dark:text-gray-100" id="tableTapPhim">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên Phim</th>
                            <th scope="col">Hình Ảnh Phim</th>
                            <th scope="col">Tập Phim</th>
                            <th scope="col">Link Phim</th>
                            <th scope="col">Quản lý</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_episode as $key => $episode)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$episode->movie->title}}</td>
                                <td><img width="100%" src="{{ asset('uploads/movie/'.$episode->movie->image) }}"></td>
                                <td>{{$episode->episode}}</td>
                                {{--                                <style type="text/css">--}}
                                {{--                                    .iframe_phim iframe {--}}
                                {{--                                        width: 60%;--}}
                                {{--                                        height: 200px;--}}
                                {{--                                    }--}}
                                {{--                                </style>--}}
                                <td class="iframe_phim" style="width: 20%">{{ $episode->linkphim }}</td>
                                <td>
                                    <button id="submitBtn" type="button" class="btn btn-danger" onclick="showModal()">
                                        Xoá
                                    </button>

                                    <a href="{{route('episode.edit', $episode->id)}}" class="btn btn-warning">Sửa</a>
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
                                <p>Bạn có chắc chắn muốn xoá tập phim này?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                {!! Form::open(['method'=>'DELETE', 'route'=>['episode.destroy', $episode->id]]) !!}
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
    function showModal() {
        $('#confirmModal').modal('show');
    }

    $(document).ready(function () {
        $('#tableTapPhim').DataTable();
    });
</script>
