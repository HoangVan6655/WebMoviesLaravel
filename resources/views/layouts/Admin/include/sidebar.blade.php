<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html"><img src='{{ asset ('admin/images/logo.svg') }}'
                                                                   alt="logo"/></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src='{{ asset ('admin/images/logo-mini.svg') }}'
                                                                        alt="logo"/></a>
    </div>
    <ul class="nav">
        {{--Profile--}}
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src='{{ asset ('admin/images/faces/face15.jpg') }}' alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                        <span>Admin Movies Web</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                     aria-labelledby="profile-dropdown">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-account text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Profile</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-logout  text-danger"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Logout</p>
                        </div>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </div>
            </div>
        </li>
        {{--Action--}}
        <li class="nav-item nav-category">
            <span class="nav-link">Quản Lý</span>
        </li>
        {{--Trang Chủ--}}
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('dashboard') }}">
                      <span class="menu-icon">
                        <i class="mdi mdi-speedometer"></i>
                      </span>
                <span class="menu-title">Trang Chủ <Admin></Admin></span>
            </a>
        </li>
        {{--Danh Mục Phim--}}
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
                      <span class="menu-icon">
                        <i class="mdi mdi-laptop"></i>
                      </span>
                <span class="menu-title">Danh Mục Phim</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('category.create') }}">Thêm Mới Danh Mục</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('category.index') }}">Danh Sách Danh Mục</a>
                    </li>
                </ul>
            </div>
        </li>
        {{--Thể Loại Phim--}}
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#genre" aria-expanded="false" aria-controls="genre">
                      <span class="menu-icon">
                        <i class="mdi mdi-laptop"></i>
                      </span>
                <span class="menu-title">Thể Loại Phim</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="genre">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('genre.create') }}">Thêm Mới Thể Loại</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('genre.index') }}">Danh Sách Thể Loại</a>
                    </li>
                </ul>
            </div>
        </li>
        {{--Quốc Gia Phim--}}
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#country" aria-expanded="false" aria-controls="country">
                      <span class="menu-icon">
                        <i class="mdi mdi-laptop"></i>
                      </span>
                <span class="menu-title">Quốc Gia Phim</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="country">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('country.create') }}">Thêm Mới Quốc Gia</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('country.index') }}">Danh Sách Quốc Gia</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#movie" aria-expanded="false" aria-controls="movie">
                      <span class="menu-icon">
                        <i class="mdi mdi-laptop"></i>
                      </span>
                <span class="menu-title">Phim</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="movie">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('movie.create') }}">Thêm Mới Phim</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('movie.index') }}">Danh Sách Phim</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#episode" aria-expanded="false" aria-controls="episode">
                      <span class="menu-icon">
                        <i class="mdi mdi-laptop"></i>
                      </span>
                <span class="menu-title">Tập Phim</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="episode">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('episode.create') }}">Thêm Mới Tập Phim</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('episode.index') }}">Danh Sách Tập Phim</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
