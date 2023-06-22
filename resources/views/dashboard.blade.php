@extends('layouts.Admin.admin')

@section('content')
    <div class="content-wrapper">
        <div class="row ">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thống Kê</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th> Danh Mục Phim</th>
                                    <th> Thể Loại</th>
                                    <th> Quốc Gia</th>
                                    <th> Phim</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td> Có {{ $categoryCount }} Danh Mục</td>
                                    <td> Có {{ $genreCount }} Thể Loại</td>
                                    <td> Có {{ $countryCount }} Quốc Gia</td>
                                    <td> Có {{ $movieCount }} Phim</td>
                                </tr>
                                </tbody>
                            </table>
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
                            <h4 class="card-title mb-1">Tổng Phim Theo Từng Danh Mục</h4>
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
                        <h4 class="card-title">Tổng Phim Theo Từng Quốc Gia</h4>
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
