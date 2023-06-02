<div class="section-bar clearfix">
    <div class="row">
        <form action="{{ route('locphim') }}" method="GET">
            <style type="text/css">
                .stylish_filter {
                    border: 0;
                    background: #12171b;
                    color: #fff;
                }

                .btn-filter {
                    border: 0 #b2b7bb;
                    background: #12171b;
                    color: #fff;
                    padding: 9px;
                }
            </style>
            <div class="col-md-3">
                <div class="form-group">
                    <select class="form-control stylish_filter" name="order"
                            id="exampleFormControlSelect1">
                        <option value="">Sắp Xếp</option>
                        <option value="date">Ngày Đăng</option>
                        <option value="year_release">Năm Sản Xuất</option>
                        <option value="name_a_z">Tên Phim</option>
                        <option value="watch_views">Lượt Xem</option>
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <select class="form-control stylish_filter" name="genre"
                            id="exampleFormControlSelect1">
                        <option value="">Thể Loại</option>
                        @foreach($TheLoai as $key => $gen_filter)
                            <option value="{{ $gen_filter->id }}">{{ $gen_filter->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <select class="form-control stylish_filter" name="country"
                            id="exampleFormControlSelect1">
                        <option value="">Quốc Gia</option>
                        @foreach($QuocGia as $key => $country_filter)
                            <option
                                value="{{ $country_filter->id }}">{{ $country_filter->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-2 ">
                <div class="form-group ">
                    {!! Form::selectYear('year', 2000, 2023, null, ['class'=>'form-control stylish_filter', 'placeholder'=>'Năm']) !!}
                </div>
            </div>

            <div class="col-md-2 ">
                <input type="submit" class="btn btn-sm btn-default btn-filter" value="Lọc Phim">
            </div>

        </form>
    </div>
</div>
