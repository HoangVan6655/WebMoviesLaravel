<div class="navbar-container">
    <div class="container">
        <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse"
                        data-target="#halim" aria-expanded="false">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="halim">
                <div class="menu-menu_1-container">
                    <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
                        <li class="current-menu-item active">
                            <a title="Trang Chủ" href="{{ route('homepage') }}">Trang Chủ</a>
                        </li>

                        <li class="mega dropdown">
                            <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle"
                               aria-haspopup="true">
                                Thể Loại <span class="caret"></span>
                            </a>
                            <ul role="menu" class=" dropdown-menu">
                                @foreach($TheLoai as $key => $genre)
                                    <li>
                                        <a title="{{ $genre->title }}" href="{{ route('genre', $genre->slug) }}">
                                            {{ $genre->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="mega dropdown">
                            <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle"
                               aria-haspopup="true">
                                Quốc Gia <span class="caret"></span>
                            </a>
                            <ul role="menu" class=" dropdown-menu">
                                @foreach($QuocGia as $key => $country)
                                    <li class="mega">
                                        <a title="{{$country->title}}" href="{{ route('country', $country->slug) }}">
                                            {{$country->title}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="mega dropdown">
                            <a title="Năm Phim" href="#" data-toggle="dropdown" class="dropdown-toggle"
                               aria-haspopup="true">
                                Năm Phim <span class="caret"></span>
                            </a>
                            <ul role="menu" class=" dropdown-menu">
                                @for($year=2000; $year<=2023;$year++)
                                    <li class="mega">
                                        <a title="{{$year}}" href="{{ url('nam',$year) }}">
                                            {{$year}}
                                        </a>
                                    </li>
                                @endfor
                            </ul>
                        </li>

                        @foreach($category as $key => $cate)
                            <li class="mega">
                                <a title="{{$cate->title}}" href="{{ route('category', $cate->slug) }}">
                                    {{$cate->title}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>

        <div class="collapse navbar-collapse" id="search-form">
            <div id="mobile-search-form" class="halim-search-form"></div>
        </div>
        <div class="collapse navbar-collapse" id="user-info">
            <div id="mobile-user-login"></div>
        </div>
    </div>
</div>
