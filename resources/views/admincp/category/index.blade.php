@extends('layouts.Admin.admin')

@section('content')
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liệt Kê Danh Sách Danh Mục Phim</h4>

                    <style>
                        #tableDanhMucPhim_length label {
                            font-size: 0;
                        }

                        #tableDanhMucPhim_length select {
                            color: white;
                        }

                        #tableDanhMucPhim_filter label {
                            display: flex;
                            align-items: center;
                        }

                        #tableDanhMucPhim_filter input[type="search"] {
                            width: 400px;
                            color: white;
                        }

                        #tableDanhMucPhim_filter label span {
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
                        <table class="table" id="tableDanhMucPhim">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"
                                    style="text-align: center; align-items: center; font-size: 20px; color: white; ">
                                    Tên danh mục Phim
                                </th>
                                <th scope="col"
                                    style="text-align: center; align-items: center; font-size: 20px; color: white; ">
                                    Slug
                                </th>
                                <th scope="col"
                                    style="text-align: center; align-items: center; font-size: 20px; color: white; ">
                                    Mô tả danh mục Phim
                                </th>
                                <th scope="col"
                                    style="text-align: center; align-items: center; font-size: 20px; color: white; ">
                                    Tình trạng danh mục Phim
                                </th>
                                <th scope="col"
                                    style="text-align: center; align-items: center; font-size: 20px; color: white; ">
                                    Quản lý
                                </th>
                            </tr>
                            </thead>

                            <tbody class="order_position"
                                   style="text-align: center; align-items: center; font-size: 18px; color: white;">
                            @foreach($list as $key => $cate)
                                <tr id="{{ $cate->id }}">
                                    <th scope="row">{{$key}}</th>
                                    <td>{{$cate->title}}</td>
                                    <td>{{$cate->slug}}</td>
                                    <td>{{$cate->description}}</td>
                                    <td>
                                        @if($cate->status)
                                            Hiển thị
                                        @else
                                            Không hiển Thị
                                        @endif
                                    </td>
                                    <td>
                                        <button id="submitBtn" type="button" class="btn btn-danger"
                                                onclick="showModal({{ $cate->id }})">
                                            Xoá
                                        </button>

                                        <a href="{{route('category.edit', $cate->id)}}" class="btn btn-warning">Sửa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
                    <script>
                        $('.order_position').sortable({
                            placeholder: 'ui-state-highlight',
                            update: function (event, ui) {
                                var array_id = [];
                                $('.order_position tr').each(function () {
                                    array_id.push($(this).attr('id'));
                                })
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    url: "{{route('resortingCategory')}}",
                                    method: "POST",
                                    data: {array_id: array_id},
                                    success: function (data) {
                                        alert('Sắp xếp thứ tự thành công');
                                    }
                                })
                            }
                        })
                    </script>
                </div>

                <!-- Confirm Modal -->
                <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-gray-100 dark:bg-gray-800 text-white">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmModalLabel">Xác nhận thao tác</h5>
                                <button type="button" class="mdi mdi-close" data-bs-dismiss="modal"
                                        aria-label="Close"
                                        style="background-color: #191c24; border: none; color: white"></button>
                            </div>
                            <div class="modal-body">
                                <p>Bạn có chắc chắn muốn xoá danh mục phim này?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                {!! Form::open(['method'=>'DELETE', 'route'=>['category.destroy', $cate->id]]) !!}
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
        $('#tableDanhMucPhim').DataTable();
    });
</script>

<script>
    function showModal(categoryID) {
        $('#confirmModal').modal('show');
        $('#confirmModal form').attr('action', "{{ route('category.destroy', '') }}/" + categoryId);
    }
</script>
