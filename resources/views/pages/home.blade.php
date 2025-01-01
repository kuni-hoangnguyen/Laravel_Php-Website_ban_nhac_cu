@extends('layout')
@section('content')
    <!-- Hero Banner Begin -->
    <div class="container" style="padding-bottom: 32px">
        <div class="hero__item set-bg" data-setbg="{{ asset('images/banner/' . $hero_banner[0]->banner_image) }}">
            <div class="hero__text">
                <span>{{ $hero_banner[0]->sub_title }}</span>
                <h2>{!! $hero_banner[0]->main_title !!}</h2>
                <p>{{ $hero_banner[0]->short_description }}</p>
                <a href="{{ URL::to('/shop') }}" class="primary-btn">MUA NGAY</a>
            </div>
        </div>
    </div>
    <!-- Hero Banner End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($all_type as $type)
                        <div class="col-lg-3">
                            <div class="categories__item set-bg"
                                data-setbg="{{ asset('images/type/' . $type->image_type) }}">
                                <h5><a
                                        href="{{ URL::to('/category_type/' . $type->id_type) }}">{{ $type->category_type }}</a>
                                </h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
    <!-- Featured Section Begin -->
    <section class="featured spad" id="f-prd">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($featured_product as $prd)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg"
                                data-setbg="{{ URL::asset('/images/category/' . $prd->category_image) }}">
                                <ul class="featured__item__pic__hover">
                                    <!-- Add to favorite form -->
                                    <li>
                                        <form action="{{ URL::to('/add-to-favorite/' . $prd->category_id) }}#f-prd"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit">
                                                <i class="fa fa-heart"></i>
                                            </button>
                                        </form>
                                    </li>
                                    <!-- Add to cart form -->
                                    <li>
                                        <form action="{{ URL::to('/add-to-cart/' . $prd->category_id) }}#f-prd"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" {{ $prd->category_quantity == 0 ? 'disabled' : '' }}
                                                style="{{ $prd->category_quantity == 0 ? 'background-color:#E5E5E5; border-color:#E5E5E5;' : '' }};">
                                                <i class="fa fa-shopping-cart"
                                                    style="{{ $prd->category_quantity == 0 ? 'color:black;' : '' }};"></i>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="{{ URL::to('/product/' . $prd->category_id) }}">{{ $prd->category_name }}</a>
                                </h6>
                                <h5>{{ number_format($prd->category_price) }}đ</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->
    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm mới</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($new_product1 as $product)
                                    <a href="{{ URL::to('/product/' . $product->category_id) }}"
                                        class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ URL::asset('images/category/' . $product->category_image) }}"
                                                alt=""style="max-width: 110px">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $product->category_name }}</h6>
                                            <span>{{ number_format($product->category_price) }}đ</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach ($new_product2 as $product)
                                    <a href="{{ URL::to('/product/' . $product->category_id) }}"
                                        class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ URL::asset('images/category/' . $product->category_image) }}"
                                                alt=""style="max-width: 110px">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $product->category_name }}</h6>
                                            <span>{{ number_format($product->category_price) }}đ</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Đánh giá cao</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($top_product1 as $product)
                                    <a href="{{ URL::to('/product/' . $product->category_id) }}"
                                        class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ URL::asset('images/category/' . $product->category_image) }}"
                                                alt=""style="max-width: 110px">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $product->category_name }}</h6>
                                            <span>{{ number_format($product->category_price) }}đ</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach ($top_product2 as $product)
                                    <a href="{{ URL::to('/product/' . $product->category_id) }}"
                                        class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ URL::asset('images/category/' . $product->category_image) }}"
                                                alt=""style="max-width: 110px">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $product->category_name }}</h6>
                                            <span>{{ number_format($product->category_price) }}đ</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm khác</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach ($other_product1 as $product)
                                    <a href="{{ URL::to('/product/' . $product->category_id) }}"
                                        class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ URL::asset('images/category/' . $product->category_image) }}"
                                                alt=""style="max-width: 110px">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $product->category_name }}</h6>
                                            <span>{{ number_format($product->category_price) }}đ</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach ($other_product2 as $product)
                                    <a href="{{ URL::to('/product/' . $product->category_id) }}"
                                        class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ URL::asset('images/category/' . $product->category_image) }}"
                                                alt=""style="max-width: 110px">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $product->category_name }}</h6>
                                            <span>{{ number_format($product->category_price) }}đ</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->
    <!-- Banner Begin -->
    <div class="banner" style="padding: 70px 0">
        <div class="container">
            <div class="row">
                @foreach ($banners as $banner)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="banner__pic">
                            <img src="{{ asset('images/banner/' . $banner->banner_image) }}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Banner End -->
@endsection
