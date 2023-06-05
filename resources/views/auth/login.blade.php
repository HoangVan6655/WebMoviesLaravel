<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset ('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('admin/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset ('admin/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset ('admin/images/favicon.png') }}"/>
</head>

<body>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3">Đăng Nhập</h3>
                            <form>
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input id="email" type="email" name="email" class="form-control p_input"
                                           :value="old('email')" required autofocus autocomplete="username">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                                </div>
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input class="form-control p_input" id="password" type="password" name="password"
                                           required autocomplete="current-password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input"> Ghi Nhớ Tôi </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                           href="{{ route('password.request') }}">
                                            {{ __('Quên Mật Khẩu ?') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">Đăng Nhập</button>
                                </div>
                                <p class="sign-up">Chưa có tài khoản ?<a href="./register"> Đăng Ký</a></p>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
</form>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset ('admin/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset ('admin/js/off-canvas.js') }}"></script>
<script src="{{ asset ('admin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset ('admin/js/misc.js') }}"></script>
<script src="{{ asset ('admin/js/settings.js') }}"></script>
<script src="{{ asset ('admin/js/todolist.js') }}"></script>
<!-- endinject -->
</body>
</html>
