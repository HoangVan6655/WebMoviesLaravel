<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Danh Sách Tập Phim') }}
        </h2>
    </x-slot>

    {{--Form Thêm Phim--}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"
             style="background-color: rgb(17 24 39 / var(--tw-bg-opacity)); color: black">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(!isset($episode))
                        {!! Form::open(['route' => 'episode.store', 'method'=> 'POST', 'enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route' => ['episode.update', $episode->id], 'method'=> 'PUT', 'enctype'=>'multipart/form-data']) !!}
                    @endif

                    {{--Chọn Phim--}}
                    <div style="margin-bottom: 10pt;">
                        {!! Form::label('movie_title', 'Tên Phim ', []) !!}
                    </div>

                    <div style="display: flex; margin-bottom: 10pt; ">
                        {!! Form::text('movie_title', isset($movie) ? $movie->title : '', ['class' => 'form-control', 'style' => 'width: 100%; color: black', 'readonly']) !!}
                        {!! Form::hidden('movie_id', isset($movie) ? $movie->id : '') !!}
                    </div>

                    {{--Link Tập Phim--}}
                    <div style="margin-bottom: 10pt">
                        {!! Form::label('link', 'Link Phim ', []) !!}
                    </div>
                    <div style="display: flex; margin-bottom: 10pt">
                        {!! Form::text('link', isset($episode) ? $episode->linkphim : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào link phim...', 'style' => 'width: 100%; color: black']) !!}
                    </div>

                    {{--Tập Phim--}}
                    <div style="margin-bottom: 10pt;">
                        {!! Form::label('episode', 'Tập Phim ', []) !!}

                    </div>

                    <div style="display: flex; margin-bottom: 10pt">
                        @if(isset($episode))
                            {!! Form::text('episode', isset($episode) ? $episode->episode : '',
                                ['class' => 'form-control', 'placeholder' => 'Nhập vào tập phim...', 'style' => 'width: 100%; color: black',
                                isset($episode) ? 'readonly' : '']) !!}
                        @else
                            {!! Form::selectRange('episode', 1, $movie->SoTap, $movie->SoTap, ['class' => 'form-control']) !!}
                        @endif
                    </div>

                    {{--Submit--}}
                    @if(!isset($episode))
                        <div>
                            {!! Form::submit('Thêm Tập Phim Mới', ['class' => 'btn btn-success']) !!}
                        </div>
                    @else
                        <div>
                            {!! Form::submit('Cập Nhật Tập Phim', ['class' => 'btn btn-success']) !!}
                        </div>
                    @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    {{--Danh Sách Tập Phim--}}
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
                                <td><img width="50%" src="{{ asset('uploads/movie/'.$episode->movie->image) }}"></td>
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
                @if(isset($episode))
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
                @endif

            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
    function showModal() {
        $('#confirmModal').modal('show');
    }

    $(document).ready(function () {
        $('#tableTapPhim').DataTable();
    });
</script>
