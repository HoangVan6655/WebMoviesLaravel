@extends('layouts.Admin.admin')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-sm-3 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h3 class="mb-0">Danh Mục Phim</h3>
                                </div>
                                <h6 class="text-muted font-weight-normal">Có {{ $categoryCount }} Danh Mục Phim</h6>
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-collage text-warning ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h3 class="mb-0">Thể Loại Phim</h3>
                                </div>
                                <h6 class="text-muted font-weight-normal"> Có {{ $genreCount }} Thể Loại Phim</h6>
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-shape-plus text-danger ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h3 class="mb-0">Quốc Gia Phim</h3>
                                </div>
                                <h6 class="text-muted font-weight-normal">Có {{ $countryCount }} Quốc Gia Phim</h6>
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-airballoon text-primary ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">Phim</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal">Có {{ $movieCount }} Phim</h6>
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title mb-1">Tổng Phim Theo Mỗi Danh Mục</h4>
                            <a class="nav-link btn btn-success create-new-button" href="{{ route('category.create') }}">+
                                Thêm Mới</a>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @foreach($listCategory as $key => $category)
                                                    <div class="table-responsive">
                                                        <table class="table" style="text-align: left">
                                                            <tbody>
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td class="text-center">{{$category->title}}</td>
                                                                <td class="text-right font-weight-medium"> {{ $countMoviesByCategory[$category->id] }}
                                                                    Phim
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title mb-1">Tổng Phim Theo Từng Thể Loại</h4>
                            <a class="nav-link btn btn-success create-new-button" href="{{ route('genre.create') }}">+
                                Thêm Mới</a>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @php
                                                            $halfCount = ceil($listGenre->count() / 2);
                                                        @endphp

                                                        @foreach($listGenre->take($halfCount) as $key => $genre)
                                                            <div class="table-responsive">
                                                                <table class="table" style="text-align: left">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>{{ $key + 1 }}</td>
                                                                        <td class="text-center">{{ $genre->title }}</td>
                                                                        <td class="text-right font-weight-medium">
                                                                            {{ $countMoviesByGenre[$genre->id] }} Phim
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <div class="col-md-6">
                                                        @foreach($listGenre->skip($halfCount) as $key => $genre)
                                                            <div class="table-responsive">
                                                                <table class="table" style="text-align: left">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>{{ $key + 1 }}</td>
                                                                        <td class="text-center">{{ $genre->title }}</td>
                                                                        <td class="text-right font-weight-medium">
                                                                            {{ $countMoviesByGenre[$genre->id] }} Phim
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Tổng Phim Theo Từng Quốc Gia</h4>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="d-flex align-items-center justify-content-start">
                                    <a class="nav-link btn btn-success create-new-button"
                                       href="{{ route('country.create') }}">+ Thêm Mới</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                @foreach($listCountry as $key => $country)
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <i class="flag-icon flag-icon-{{$country->icon}}"></i>
                                                </td>
                                                <td class="text-center">{{$country->title}}</td>
                                                <td class="text-right font-weight-medium"> {{ $countMoviesByCountry[$country->id] }}
                                                    Phim
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-7" style="height: 100px">
                                <div id="audience-map" class="vector-map"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
