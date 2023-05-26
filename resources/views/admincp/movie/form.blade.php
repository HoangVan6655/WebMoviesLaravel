<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Quản Lý Phim') }}
        </h2>
        <a href="{{ route('movie.index') }}" class="btn btn-light" style="margin-top: 30px">Danh Sách Phim</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: rgb(17 24 39 / var(--tw-bg-opacity)); color: black">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(!isset($movie))
                        {!! Form::open(['route' => 'movie.store', 'method'=> 'POST', 'enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route' => ['movie.update', $movie->id], 'method'=> 'PUT', 'enctype'=>'multipart/form-data']) !!}
                    @endif
                    {{--Title--}}
                    <div style="margin-bottom: 10pt">
                        {!! Form::label('title', 'Tên Phim ', []) !!}
                    </div>
                    <div style="display: flex; margin-bottom: 10pt">
                        {!! Form::text('title', isset($movie) ? $movie->title : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào tên phim...', 'style' => 'width: 100%; color: black', 'id' => 'title', 'onkeyup'=>'ChangeToSlug()']) !!}
                    </div>

                    {{--Name Original--}}
                    <div style="margin-bottom: 10pt">
                        {!! Form::label('nameOriginal', 'Tên Phim Gốc ', []) !!}
                    </div>
                    <div style="display: flex; margin-bottom: 10pt">
                        {!! Form::text('name_original', isset($movie) ? $movie->name_original : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào tên phim gốc...', 'style' => 'width: 100%; color: black', 'id' => 'slug', 'onkeyup'=>'ChangeToSlug()']) !!}
                    </div>

                    {{--Thoi Luong--}}
                    <div style="margin-bottom: 10pt">
                        {!! Form::label('ThoiLuong', 'Thời Lượng Phim ', []) !!}
                    </div>
                    <div style="display: flex; margin-bottom: 10pt">
                        {!! Form::text('ThoiLuong', isset($movie) ? $movie->ThoiLuong : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào thời lượng phim...', 'style' => 'width: 100%; color: black']) !!}
                    </div>

                    {{--Slug--}}
                    <div style="margin-bottom: 10pt">
                        {!! Form::label('slug', 'Slug ', []) !!}
                    </div>
                    <div style="display: flex; margin-bottom: 10pt">
                        {!! Form::text('slug', isset($movie) ? $movie->slug : '', ['class' => 'form-control', 'placeholder' => 'Slug tên phim...', 'style' => 'width: 100%; color: black', 'id' => 'convert_slug']) !!}
                    </div>

                    {{--Description--}}
                    <div style="margin-bottom: 10pt;">
                        {!! Form::label('description', 'Mô Tả Phim ', []) !!}
                    </div>
                    <div style="display: flex; margin-bottom: 10pt; ">
                        {!! Form::textarea('description', isset($movie) ? $movie->description : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào mô tả phim...', 'style' => 'resize: none; width: 100%; color: black', 'id' => 'description']) !!}
                    </div>

                    {{--Tag--}}
                    <div style="margin-bottom: 10pt;">
                        {!! Form::label('tags', 'Tags Phim ', []) !!}
                    </div>
                    <div style="display: flex; margin-bottom: 10pt; ">
                        {!! Form::textarea('tags', isset($movie) ? $movie->tags : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào tags phim...', 'style' => 'resize: none; width: 100%; color: black']) !!}
                    </div>

                    {{--Category--}}
                    <div style="margin-bottom: 10pt;">
                        {!! Form::label('Category', 'Tên Danh Mục Phim ', []) !!}
                    </div>

                    <div style="display: flex; margin-bottom: 10pt; ">
                        {!! Form::select('category_id', $category, isset($movie) ? $movie->category_id : '', ['class'=>'form-control']) !!}
                    </div>

                    {{--Genre--}}
                    <div style="margin-bottom: 10pt;">
                        {!! Form::label('Genre', 'Tên Loại Phim', []) !!}
                    </div>

                    <div style="display: flex; margin-bottom: 10pt; ">
                        {!! Form::select('genre_id', $genre, isset($movie) ? $movie->genre_id : '', ['class'=>'form-control']) !!}
                    </div>

                    {{--Country--}}
                    <div style="margin-bottom: 10pt;">
                        {!! Form::label('Country', 'Tên Quốc Gia Phim ', []) !!}
                    </div>

                    <div style="display: flex; margin-bottom: 10pt; ">
                        {!! Form::select('country_id', $country, isset($movie) ? $movie->country_id: '', ['class'=>'form-control']) !!}
                    </div>

                    {{--Status--}}
                    <div style="margin-bottom: 10pt;">
                        {!! Form::label('status', 'Trạng Thái ', []) !!}
                    </div>

                    <div style="display: flex; margin-bottom: 10pt; ">
                        {!! Form::select('status', ['1'=>'Hiển Thị', '0'=>'Không Hiển Thị'], isset($movie) ? $movie->status : '', ['class'=>'form-control']) !!}
                    </div>

                    {{--Resolution--}}
                    <div style="margin-bottom: 10pt;">
                        {!! Form::label('resolution', 'Định Dạng ', []) !!}
                    </div>

                    <div style="display: flex; margin-bottom: 10pt; ">
                        {!! Form::select('resolution', ['0'=>'HD', '1'=>'SD', '2'=>'HDCam', '3'=>'Cam', '4'=>'FullHD'], isset($movie) ? $movie->resolution : '', ['class'=>'form-control']) !!}
                    </div>

                    {{--Sub--}}
                    <div style="margin-bottom: 10pt;">
                        {!! Form::label('phude', 'Phụ Đề ', []) !!}
                    </div>

                    <div style="display: flex; margin-bottom: 10pt; ">
                        {!! Form::select('phude', ['0'=>'Phụ Đề', '1'=>'Thuyết Minh'], isset($movie) ? $movie->phude : '', ['class'=>'form-control']) !!}
                    </div>

                    {{--Phim Hot--}}
                    <div style="margin-bottom: 10pt;">
                        {!! Form::label('Hot', 'Phim Hot ', []) !!}
                    </div>

                    <div style="display: flex; margin-bottom: 10pt; ">
                        {!! Form::select('movie_hot', ['1'=>'Có', '0'=>'Không'], isset($movie) ? $movie->movie_hot : '', ['class'=>'form-control']) !!}
                    </div>

                    {{--Image--}}
                    <div style="margin-bottom: 10pt;">
                        {!! Form::label('Image', 'Hình Ảnh ', []) !!}
                    </div>

                    <div style="display: flex; margin-bottom: 10pt; ">
                        {!! Form::file('image', ['class'=>'form-control-file']) !!}
                    </div>

                    <div style="margin-bottom: 10pt;">
                        @if(isset($movie))
                            <img width="20%" src="{{ asset('uploads/movie/'.$movie->image) }}" >
                        @else
                        @endif
                    </div>

                    {{--Submit--}}
                    @if(!isset($movie))
                        <div>
                            {!! Form::submit('Thêm Phim Mới', ['class' => 'btn btn-success']) !!}
                        </div>
                    @else
                        <div>
                            {!! Form::submit('Cập Nhật Phim', ['class' => 'btn btn-success']) !!}
                        </div>
                    @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
