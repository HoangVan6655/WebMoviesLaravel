<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Quản Lý Tập Phim Phim') }}
        </h2>
        <a href="{{ route('episode.index') }}" class="btn btn-light" style="margin-top: 30px">Danh Sách Tập Phim</a>
    </x-slot>

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
                        {!! Form::label('movie', 'Chọn Phim ', []) !!}
                    </div>

                    <div style="display: flex; margin-bottom: 10pt; ">
                        {!! Form::select('movie_id', ['0'=>'Chọn Phim', 'Phim'=>$list_movie],
                            isset($episode) ? $episode->movie_id : '', ['class'=>'form-control select-movie']) !!}
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
                            <select name="episode" class="form-control"
                                    style="display: flex; margin-bottom: 10pt; margin-top: 10pt; " id="show_movie">
                            </select>
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
</x-app-layout>
