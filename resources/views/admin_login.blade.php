<!DOCTYPE html>
<html lang="vi">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ URL::asset('backend/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ URL::asset('backend/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ URL::asset('logo.png') }}" alt="logo">
                            </div>
                            <h4>Đăng nhập để bắt đầu.</h4>
                            <form class="pt-3" method="POST" action="{{ URL::to('/admin-dashboard') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                        placeholder="Tên đăng nhập" name="admin_email" required="">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Mật khẩu" name="admin_password"
                                        required="">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        type="submit">ĐĂNG NHẬP</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Ghi nhớ đăng nhập
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Quên mật khẩu?</a>
                                </div>
                                <div class="justify-content-between align-items-center">
                                    <?php
                                    $message = Session::get('message');
                                    if ($message) {
                                        echo '<div class="alert alert-danger">';
                                        echo '<strong>Warning!</strong> ' . $message;
                                        echo '</div>';
                                        Session::forget('message');
                                    }
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ URL::asset('backend/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ URL::asset('backend/js/off-canvas.js') }}"></script>
    <script src="{{ URL::asset('backend/js/hoverable-collapse.js') }}"></script>
    <script src="{{ URL::asset('backend/js/template.js') }}"></script>
    <script src="{{ URL::asset('backend/js/settings.js') }}"></script>
    <script src="{{ URL::asset('backend/js/todolist.js') }}"></script>
    <!-- endinject -->
</body>

</html>
