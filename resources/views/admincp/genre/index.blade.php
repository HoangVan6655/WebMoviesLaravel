<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Danh Sách Thể Loại Phim') }}
        </h2>

        <a href="{{ route('genre.create') }}" class="btn btn-light" style="margin-top: 30px">Thêm Thể Loại Phim</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: rgb(17 24 39 / var(--tw-bg-opacity)); color: black">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">
                    <table class="table text-gray-900 dark:text-gray-100" id="tableTheLoaiPhim">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên thể loại Phim</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Mô tả thể loại Phim</th>
                            <th scope="col">Tình trạng thể loại Phim</th>
                            <th scope="col">Quản lý</th>
                        </tr>
                        </thead>
                        <tbody class="order_position">
                        @foreach($list as $key => $gen)
                            <tr id="{{ $gen->id }}">
                                <th scope="row">{{$key}}</th>
                                <td>{{$gen->title}}</td>
                                <td>{{$gen->slug}}</td>
                                <td>{{$gen->description}}</td>
                                <td>
                                    @if($gen->status)
                                        Hiển thị
                                    @else
                                        Không hiển Thị
                                    @endif
                                </td>
                                <td>
                                    <button id="submitBtn" type="button" class="btn btn-danger" onclick="showModal()">
                                        Xoá
                                    </button>

                                    <a href="{{route('genre.edit', $gen->id)}}" class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Confirm Modal -->
                <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-gray-100 dark:bg-gray-800 text-white">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmModalLabel">Xác nhận thao tác</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Bạn có chắc chắn muốn xoá thể loại phim này?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                {!! Form::open(['method'=>'DELETE', 'route'=>['genre.destroy', $gen->id]]) !!}
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

    $(document).ready( function () {
        $('#tableTheLoaiPhim').DataTable();
    } );

    $('.order_position').sortable({
        placeholder : 'ui-state-highlight',
        update: function(event,ui){
            var array_id = [];
            $('.order_position tr').each(function(){
                array_id.push($(this).attr('id'));
            })
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"{{route('resortingGenre')}}",
                method:"POST",
                data:{array_id:array_id},
                success:function(data){
                    alert('Sắp xếp thứ tự thành công');
                }
            })
        }
    })
</script>
