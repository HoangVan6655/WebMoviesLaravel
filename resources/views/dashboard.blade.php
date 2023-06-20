@extends('layouts.Admin.admin')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Transaction History</h4>
                        <canvas id="transaction-history" class="transaction-chart"></canvas>

                        <!-- Trong file blade template -->
                        @if ($listCategory)
                            <script>
                                var categoryData = [];

                                @foreach ($listCategory as $key => $category)
                                var item = {
                                    index: {{ $key + 1 }},
                                    title: "{{ $category->title }}",
                                    count: {{ $countMoviesByCategory[$category->id] }}
                                };

                                categoryData.push(item);
                                @endforeach
                                console.log(categoryData);

                                // Đưa dữ liệu vào thẻ div
                                var categoryDataDiv = document.getElementById('categoryData');
                                categoryDataDiv.dataset.categoryData = JSON.stringify(categoryData);

                                console.log(categoryDataDiv);
                            </script>
                        @endif
                        <div id="categoryData" data-category-data=""></div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 grid-margin stretch-card">
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
        </div>

        <div class="row ">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Order Status</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="form-check form-check-muted m-0">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                            </label>
                                        </div>
                                    </th>
                                    <th> Client Name</th>
                                    <th> Order No</th>
                                    <th> Product Cost</th>
                                    <th> Project</th>
                                    <th> Payment Mode</th>
                                    <th> Start Date</th>
                                    <th> Payment Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-muted m-0">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="{{ asset ('admin/images/faces/face1.jpg') }}" alt="image"/>
                                        <span class="pl-2">Henry Klein</span>
                                    </td>
                                    <td> 02312</td>
                                    <td> $14,500</td>
                                    <td> Dashboard</td>
                                    <td> Credit card</td>
                                    <td> 04 Dec 2019</td>
                                    <td>
                                        <div class="badge badge-outline-success">Approved</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-muted m-0">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="{{ asset ('admin/images/faces/face2.jpg') }}" alt="image"/>
                                        <span class="pl-2">Estella Bryan</span>
                                    </td>
                                    <td> 02312</td>
                                    <td> $14,500</td>
                                    <td> Website</td>
                                    <td> Cash on delivered</td>
                                    <td> 04 Dec 2019</td>
                                    <td>
                                        <div class="badge badge-outline-warning">Pending</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-muted m-0">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="{{ asset ('admin/images/faces/face5.jpg') }}" alt="image"/>
                                        <span class="pl-2">Lucy Abbott</span>
                                    </td>
                                    <td> 02312</td>
                                    <td> $14,500</td>
                                    <td> App design</td>
                                    <td> Credit card</td>
                                    <td> 04 Dec 2019</td>
                                    <td>
                                        <div class="badge badge-outline-danger">Rejected</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-muted m-0">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="{{ asset ('admin/images/faces/face3.jpg') }}" alt="image"/>
                                        <span class="pl-2">Peter Gill</span>
                                    </td>
                                    <td> 02312</td>
                                    <td> $14,500</td>
                                    <td> Development</td>
                                    <td> Online Payment</td>
                                    <td> 04 Dec 2019</td>
                                    <td>
                                        <div class="badge badge-outline-success">Approved</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-check-muted m-0">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="{{ asset ('admin/images/faces/face4.jpg') }}" alt="image"/>
                                        <span class="pl-2">Sallie Reyes</span>
                                    </td>
                                    <td> 02312</td>
                                    <td> $14,500</td>
                                    <td> Website</td>
                                    <td> Credit card</td>
                                    <td> 04 Dec 2019</td>
                                    <td>
                                        <div class="badge badge-outline-success">Approved</div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
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
