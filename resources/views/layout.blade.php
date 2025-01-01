<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seniks</title>
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{ URL::to('/') }}"><img src="{{ URL::asset('logo.png') }}" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li>
                    <a href="{{ URL::to('/favorite') }}">
                        <i class="fa fa-heart"></i>

                        <span>1</span>
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('/cart') }}">
                        <i class="fa fa-shopping-bag"></i>
                        @if (Cart::count() > 0)
                            <span>{{ Cart::count() }}</span>
                        @endif
                    </a>
                </li>
            </ul>
            <div class="header__cart__price">
                Sản phẩm: <span>{{ Cart::subtotal() }}đ</span>
            </div>
        </div>

        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="{{ URL::asset('frontend/img/Vietnamese.png') }}" alt="">
                <div>Tiếng Việt</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">English</a></li>
                    <li><a href="#">Tiếng Việt</a></li>
                </ul>
            </div>

            <div class="header__top__right__auth">
                @if (session('user_id'))
                    <a href="#" class="auth-link">
                        <i class="fa fa-user"></i> {{ Session::get('user_name') }}
                        <span class="arrow_carrot-down"></span>
                    </a>
                    <ul class="auth-dropdown">
                        <li><a href="{{ URL::to('/profile') }}">Trang cá nhân</a></li>
                        <li><a href="{{ URL::to('/order') }}">Đơn hàng</a></li>
                        <li><a href="{{ URL::to('/logout') }}">Đăng xuất</a></li>
                    </ul>
                @else
                    <a href="{{ URL::to('/login-form') }}"><i class="fa fa-user"></i> Đăng nhập</a>
                @endif
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="{{ URL::to('/home') }}">Trang chủ</a></li>
                <li><a href="{{ URL::to('/shop') }}">Sản phẩm</a></li>
                <li><a href="{{ URL::to('/contact') }}">Liên hệ</a></li>
                <li><a href="#">Trang</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{ URL::to('/favorite') }}">Yêu thích</a></li>
                        <li><a href="{{ URL::to('/cart') }}">Giỏ hàng</a></li>
                        <li><a href="{{ URL::to('/order') }}">Đơn hàng</a></li>
                    </ul>
                </li>
                <li><a href="{{ URL::to('/about-us') }}">Cửa hàng</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> {{ $contact_info->email }}</li>
                <li>Miễn phí vận chuyển cho đơn hàng từ 2.400.000₫</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> {{ $contact_info->email }}</li>
                                <li>Miễn phí vận chuyển cho đơn hàng từ 2.400.000₫</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="{{ URL::asset('frontend/img/Vietnamese.png') }}" alt="">
                                <div>Tiếng Việt</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Tiếng Việt</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                @if (session('user_id'))
                                    <a href="#" class="auth-link">
                                        <i class="fa fa-user"></i> {{ Session::get('user_name') }}
                                        <span class="arrow_carrot-down"></span>
                                    </a>
                                    <ul class="auth-dropdown">
                                        <li><a href="{{ URL::to('/profile') }}">Trang cá nhân</a></li>
                                        <li><a href="{{ URL::to('/order') }}">Đơn hàng</a></li>
                                        <li><a href="{{ URL::to('/logout') }}">Đăng xuất</a></li>
                                    </ul>
                                @else
                                    <a href="{{ URL::to('/login-form') }}"><i class="fa fa-user"></i> Đăng nhập</a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ URL::to('/') }}"><img src="{{ URL::asset('logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="{{ URL::to('/home') }}">Trang chủ</a></li>
                            <li><a href="{{ URL::to('/shop') }}">Sản phẩm</a></li>
                            <li><a href="{{ URL::to('/contact') }}">Liên hệ</a></li>
                            <li><a href="#">Trang</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{ URL::to('/favorite') }}">Yêu thích</a></li>
                                    <li><a href="{{ URL::to('/cart') }}">Giỏ hàng</a></li>
                                    <li><a href="{{ URL::to('/order') }}">Đơn hàng</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ URL::to('/about-us') }}">Cửa hàng</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{ URL::to('/favorite') }}"><i class="fa fa-heart"></i>
                                    @if (Session::get('user_id') && DB::table('tbl_favorite')->where('user_id', Session::get('user_id'))->count() > 0)
                                        <span>{{ DB::table('tbl_favorite')->where('user_id', Session::get('user_id'))->count() }}</span>
                                    @endif

                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('/cart') }}"><i class="fa fa-shopping-bag"></i>
                                    @if (Cart::count() > 0)
                                        <span>{{ Cart::count() }}</span>
                                    @endif
                                </a>
                            </li>

                        </ul>
                        <div class="header__cart__price">Sản phẩm: <span>{{ Cart::subtotal() }}đ</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Tất cả danh mục</span>
                        </div>
                        <ul>
                            @foreach ($all_type as $type)
                                <li><a
                                        href="{{ URL::to('/category_type/' . $type->id_type) }}">{{ $type->category_type }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{ URL::to('/search') }}" method="POST">
                                @csrf
                                <div class="hero__search__categories" style="text-align: left;"> Tất cả danh mục
                                </div>
                                <input name="keywords_submit" type="text" placeholder="Bạn cần tìm gì?">
                                <button type="submit" class="site-btn">TÌM KIẾM</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>{{ $contact_info->phone }}</h5>
                                <span>Sẵn sàng hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Hero Section End -->
    @Yield('content')
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{ URL::to('/home') }}l"><img src="{{ URL::asset('logo.png') }}"
                                    alt=""></a>
                        </div>
                        <ul>
                            <li>Địa chỉ: {{ $contact_info->address }}</li>
                            <li>Điện thoại:{{ $contact_info->phone }}</li>
                            <li>Email: {{ $contact_info->email }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Liên kết hữu ích</h6>
                        <ul>
                            <li><a href="#">Về chúng tôi</a></li>
                            <li><a href="#">Giới thiệu cửa hàng của chúng tôi</a></li>
                            <li><a href="#">Mua sắm an toàn</a></li>
                            <li><a href="#">Thông tin giao hàng</a></li>
                            <li><a href="#">Chính sách bảo mật</a></li>
                            <li><a href="#">Sơ đồ trang web</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Chúng tôi là ai</a></li>
                            <li><a href="#">Dịch vụ của chúng tôi</a></li>
                            <li><a href="#">Dự án</a></li>
                            <li><a href="#">Liên hệ</a></li>
                            <li><a href="#">Đổi mới</a></li>
                            <li><a href="#">Lời chứng thực</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Đăng ký nhận bản tin của chúng tôi</h6>
                        <p>Nhận thông báo qua email về cửa hàng và các ưu đãi đặc biệt của chúng tôi.</p>
                        <form action="#">
                            <input type="text" placeholder="Nhập email của bạn">
                            <button type="submit" class="site-btn">Đăng ký</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </footer>
    <!-- Footer Section End -->
    <!-- Js Plugins -->
    <script src="{{ URL::asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/main.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/login.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/status.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ URL::asset('frontend/js/toastr.js') }}"></script>
    <script>
        var message = @json(Session::get('message'));
        var error = @json(Session::get('error'));
        var warning = @json(Session::get('warning'));

        if (message) {
            toastr.success(message);
            @php Session::forget('message'); @endphp
        }

        if (error) {
            toastr.error(error);
            @php Session::forget('error'); @endphp
        }
        if (warning) {
            toastr.warning(warning);
            @php Session::forget('warning'); @endphp
        }
    </script>



</body>

</html>
