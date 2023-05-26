<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Quản Lý Quốc Gia Phim') }}
        </h2>

        <a href="{{ route('country.index') }}" class="btn btn-light" style="margin-top: 30px">Danh Sách Quốc Gia Phim</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: rgb(17 24 39 / var(--tw-bg-opacity)); color: black">
            <div class="bg-gray-100 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(!isset($country))
                        {!! Form::open(['route' => 'country.store', 'method'=> 'POST']) !!}
                    @else
                        {!! Form::open(['route' => ['country.update', $country->id], 'method'=> 'PUT']) !!}
                    @endif
                        {{--Title--}}
                        <div style="margin-bottom: 10pt">
                            {!! Form::label('title', 'Tên Quốc Gia ', []) !!}
                        </div>
                        <div style="display: flex; margin-bottom: 10pt">
                            {!! Form::text('title', isset($country) ? $country->title : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào tên quốc gia...', 'style' => 'width: 100%; color: black', 'id' => 'title', 'onkeyup'=>'ChangeToSlug()']) !!}
                        </div>

                        {{--Slug--}}
                        <div style="margin-bottom: 10pt">
                            {!! Form::label('slug', 'Slug ', []) !!}
                        </div>
                        <div style="display: flex; margin-bottom: 10pt">
                            {!! Form::text('slug', isset($country) ? $country->slug : '', ['class' => 'form-control', 'placeholder' => 'Slug tên quốc gia...', 'style' => 'width: 100%; color: black', 'id' => 'convert_slug']) !!}
                        </div>

                        {{--Description--}}
                        <div style="margin-bottom: 10pt;">
                            {!! Form::label('description', 'Mô Tả Quốc Gia ', []) !!}
                        </div>
                        <div style="display: flex; margin-bottom: 10pt; ">
                                {!! Form::textarea('description', isset($country) ? $country->description : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào mô tả quốc gia...', 'style' => 'resize: none; width: 100%; color: black', 'id' => 'description']) !!}
                        </div>

                        {{--Status--}}
                        <div style="margin-bottom: 10pt;">
                            {!! Form::label('status', 'Tình Trạng ', []) !!}
                        </div>

                        <div style="display: flex; margin-bottom: 10pt; ">
                            {!! Form::select('status', ['1'=>'Hiển Thị', '0'=>'Không Hiển Thị'], isset($country) ? $country->status : '', ['class'=>'form-control']) !!}
                        </div>

                        {{--Submit--}}
                        <button id="submitBtn" type="button" class="btn btn-success" onclick="return validateForm()" >
                            @if(!isset($country))
                                Thêm Quốc Gia Mới
                            @else
                                Cập Nhật Quốc Gia
                            @endif
                        </button>

                        <!-- Confirm Modal -->
                        <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content bg-gray-100 dark:bg-gray-800">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmModalLabel">Xác nhận thao tác</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" >
                                        @if(!isset($country))
                                            <p>Bạn có chắc chắn muốn thêm quốc gia mới?</p>
                                        @else
                                            <p>Bạn có chắc chắn muốn cập nhật quốc gia này?</p>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                        {!! Form::submit(isset($country) ? 'Cập Nhật' : 'Thêm Mới', ['class' => 'btn btn-success']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Toasts  -->
                        <div class="toast-container position-fixed top-0 end-0 mt-5 me-5 ">
                            <div class="toast bg-gray-100 dark:bg-gray-900" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                                <div class="toast-header bg-gray-100 dark:focus:bg-white d-flex align-items-center">
                                    <i class="fa fa-warning me-2"></i>
                                    <strong class="me-auto">Thông báo</strong>
                                    <button type="button" class="btn-close text-dark" data-bs-dismiss="toast" aria-label="Close" style="">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="toast-body">
                                </div>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    var toastLiveExample = document.getElementById('submitBtn')
    var toast = new bootstrap.Toast(document.querySelector('.toast'))

    function showToast() {
        toast.show()
    }

    function validateForm() {
        var title = document.getElementById("title").value;
        var description = document.getElementById("description").value;
        if (title == "" && description == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập đầy đủ thông tin."
            toast.show()
            return false;
        }
        else if (title == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập tên quốc gia."
            toast.show()
            return false;
        }
        else if (description == "") {
            var toast = new bootstrap.Toast(document.querySelector('.toast'))
            var toastBody = document.querySelector('.toast-body')
            toastBody.innerText = "Vui lòng nhập mô tả quốc gia."
            toast.show()
            return false;
        }
        else {
            $('#confirmModal').modal('show');
        }
    }
</script>
