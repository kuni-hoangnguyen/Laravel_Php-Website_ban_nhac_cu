<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ URL::asset('backend/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ URL::asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('backend/js/select.dataTables.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ URL::asset('backend/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="{{ URL::to('/dashboard') }}"><img
                        src="{{ URL::asset('logo.png') }}" class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{ URL::to('/dashboard') }}"><img
                        src="{{ URL::asset('logo-mini.png') }}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <span class="username">
                                <?php
                                $name = Session::get('admin_name');
                                if ($name) {
                                    echo 'Welcome, ' . $name;
                                    Session::forget('message');
                                }
                                ?>
                            </span>
                            <img src="{{ URL::asset('backend/images/faces/ava.png') }}" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="ti-settings text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="{{ URL::to('/logout-admin') }}">
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <!-- Dashboard -->
                    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ URL::to('/dashboard') }}">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Trang chủ</span>
                        </a>
                    </li>

                    <!-- Quản lý sản phẩm -->
                    <li
                        class="nav-item {{ request()->is('all-category') || request()->is('add-category') ? 'active' : '' }}">
                        <a class="nav-link {{ request()->is('all-category') || request()->is('add-category') ? '' : 'collapsed' }}"
                            data-toggle="collapse" href="#ui-basic"
                            aria-expanded="{{ request()->is('all-category') || request()->is('add-category') ? 'true' : 'false' }}"
                            aria-controls="ui-basic" data-parent="#sidebar">
                            <i class="mdi mdi-cube-outline menu-icon"></i>
                            <span class="menu-title">Sản phẩm</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse {{ request()->is('all-category') || request()->is('add-category') ? 'show' : '' }}"
                            id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('all-category') ? 'active' : '' }}"
                                        href="{{ URL::to('/all-category') }}">
                                        Danh sách sản phẩm
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('add-category') ? 'active' : '' }}"
                                        href="{{ URL::to('/add-category') }}">
                                        Thêm sản phẩm
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Quản lý banner -->
                    <li class="nav-item {{ request()->is('all-banner') ? 'active' : '' }}">
                        <a class="nav-link {{ request()->is('all-banner') ? '' : 'collapsed' }}" data-toggle="collapse"
                            href="#form-elements" aria-expanded="{{ request()->is('all-banner') ? 'true' : 'false' }}"
                            aria-controls="form-elements" data-parent="#sidebar">
                            <i class="mdi mdi-image-frame menu-icon"></i>
                            <span class="menu-title">Banner</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse {{ request()->is('all-banner') ? 'show' : '' }}" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('all-banner') ? 'active' : '' }}"
                                        href="{{ URL::to('/all-banner') }}">
                                        Cập nhật banner
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Thông tin cửa hàng -->
                    <li class="nav-item {{ request()->is('all-info') ? 'active' : '' }}">
                        <a class="nav-link {{ request()->is('all-info') ? '' : 'collapsed' }}" data-toggle="collapse"
                            href="#charts" aria-expanded="{{ request()->is('all-info') ? 'true' : 'false' }}"
                            aria-controls="charts" data-parent="#sidebar">
                            <i class="mdi mdi-storefront menu-icon"></i>
                            <span class="menu-title">Cửa hàng</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse {{ request()->is('all-info') ? 'show' : '' }}" id="charts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('all-info') ? 'active' : '' }}"
                                        href="{{ URL::to('/all-info') }}">
                                        Quản lý thông tin
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Phân loại sản phẩm -->
                    <li class="nav-item {{ request()->is('all-type') || request()->is('add-type') ? 'active' : '' }}">
                        <a class="nav-link {{ request()->is('all-type') || request()->is('add-type') ? '' : 'collapsed' }}"
                            data-toggle="collapse" href="#icons"
                            aria-expanded="{{ request()->is('all-type') || request()->is('add-type') ? 'true' : 'false' }}"
                            aria-controls="icons" data-parent="#sidebar">
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                            <span class="menu-title">Phân loại</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse {{ request()->is('all-type') || request()->is('add-type') ? 'show' : '' }}"
                            id="icons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('all-type') ? 'active' : '' }}"
                                        href="{{ URL::to('/all-type') }}">
                                        Danh sách phân loại
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('add-type') ? 'active' : '' }}"
                                        href="{{ URL::to('/add-type') }}">
                                        Thêm phân loại
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Đơn hàng -->
                    <li class="nav-item {{ request()->is('all-order') ? 'active' : '' }}">
                        <a class="nav-link {{ request()->is('all-order') ? '' : 'collapsed' }}"
                            data-toggle="collapse" href="#error"
                            aria-expanded="{{ request()->is('all-order') ? 'true' : 'false' }}" aria-controls="error"
                            data-parent="#sidebar">
                            <i class="mdi mdi-alert-circle-outline menu-icon"></i>
                            <span class="menu-title">Đơn hàng</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse {{ request()->is('all-order') ? 'show' : '' }}" id="error">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('all-order') ? 'active' : '' }}"
                                        href="{{ URL::to('/all-order') }}">
                                        Quản lý đơn hàng
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Liên hệ -->
                    <li class="nav-item {{ request()->is('all-contact') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ URL::to('/all-contact') }}">
                            <i class="mdi mdi-file-document-box menu-icon"></i>
                            <span class="menu-title">Liên hệ</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- partial -->
            @Yield('admin_content')
            <!-- main-panel ends -->
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

    <script src="{{ URL::asset('backend/js/hoverable-collapse.js') }}"></script>

    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ URL::asset('backend/js/file-upload.js') }}"></script>
    <script src="{{ URL::asset('backend/js/status.js') }}"></script>
    <script src="{{ URL::asset('backend/js/confirm-delete.js') }}"></script>
    <script src="{{ URL::asset('backend/js/sidebar.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- End custom js for this page-->
</body>

</html>
