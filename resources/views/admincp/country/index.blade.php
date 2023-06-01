<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Danh Sách Quốc Gia Phim') }}
        </h2>

        <a href="{{ route('country.create') }}" class="btn btn-light" style="margin-top: 30px">Thêm Mới Quốc Gia
            Phim</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"
             style="background-color: rgb(17 24 39 / var(--tw-bg-opacity)); color: black">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">
                    <table class="table table-responsive text-gray-900 dark:text-gray-100" id="tableQuocGiaPhim">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên quốc gia Phim</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Mô tả quốc gia Phim</th>
                            <th scope="col">Tình trạng quốc gia Phim</th>
                            <th scope="col">Quản lý</th>
                        </tr>
                        </thead>
                        <tbody class="order_position">
                        @foreach($list as $key => $cotry)
                            <tr id="{{ $cotry->id }}">
                                <th scope="row">{{$key}}</th>
                                <td>{{$cotry->title}}</td>
                                <td>{{$cotry->slug}}</td>
                                <td>{{$cotry->description}}</td>
                                <td>
                                    @if($cotry->status)
                                        Hiển thị
                                    @else
                                        Không hiển Thị
                                    @endif
                                </td>
                                <td>
                                    <button id="submitBtn" type="button" class="btn btn-danger" onclick="showModal()">
                                        Xoá
                                    </button>

                                    <a href="{{route('country.edit', $cotry->id)}}" class="btn btn-warning">Sửa</a>
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
                                <p>Bạn có chắc chắn muốn xoá quốc gia phim này?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                {!! Form::open(['method'=>'DELETE', 'route'=>['country.destroy', $cotry->id]]) !!}
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

<script type="text/javascript">
    function showModal() {
        $('#confirmModal').modal('show');
    }

    $(document).ready(function () {
        $('#tableQuocGiaPhim').DataTable();
    });

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
                url: "{{route('resortingCountry')}}",
                method: "POST",
                data: {array_id: array_id},
                success: function (data) {
                    alert('Sắp xếp thứ tự thành công');
                }
            })
        }
    })
</script>
