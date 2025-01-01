@extends('layout') @section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ URL::asset('frontend/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Tên sản phẩm</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ URL::to('/') }}">Trang chủ</a>
                            <a href="{{ URL::to('/shop') }}">Sản phẩm</a>
                            @foreach ($productDetails as $item)
                                <span>{{ $item->category_name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Product Details Section Begin -->
    <section class="product-details spad" id="pro">
        <div class="container">
            @foreach ($productDetails as $item)
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__pic">
                            <div class="product__details__pic__item">
                                <img class="product__details__pic__item--large"
                                    src="{{ URL::asset('/images/category/' . $item->category_image) }}" alt="">
                            </div>
                            <div class="">
                                <img data-imgbigurl="" src="" alt="">
                                <!-- ảnh lớn -> ảnh nhỏ -->
                                <img data-imgbigurl="" src="" alt="">
                                <img data-imgbigurl="" src="" alt="">
                                <img data-imgbigurl="" src="" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__text">
                            <div class="product-info">
                                <h3>{{ $item->category_name }}</h3>
                                <span>{{ $productType }}</span>
                            </div>
                            <div class="product__details__rating"> @php
                                $fullStars = floor($item->category_rating);
                                $halfStar = $item->category_rating - $fullStars >= 0.5 ? 1 : 0;
                                $emptyStars = 5 - ($fullStars + $halfStar);
                            @endphp @for ($i = 0; $i < $fullStars; $i++)
                                    <i class="fa fa-star"></i>
                                    @endfor @if ($halfStar)
                                        <i class="fa fa-star-half-o"></i>
                                        @endif @for ($i = 0; $i < $emptyStars; $i++)
                                            <i class="fa fa-star-o"></i>
                                        @endfor <span>( {{ $item->category_rating }}
                                            <i class="fa fa-star"></i> ) </span>
                            </div>
                            <div class="product__details__price">{{ number_format($item->category_price) }}đ</div>
                            <p>{{ $item->category_description }}</p>
                            <form action="{{ URL::to('/add-to-cart/' . $item->category_id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="product__details__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input name="qty" type="number" value="1" min="1"
                                                    max="{{ $item->category_quantity }}"
                                                    {{ $item->category_quantity == 0 ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="primary-btn" type="submit"
                                        style="border-style:none; {{ $item->category_quantity == 0 ? 'background-color:#AA934C; color:#E5E5E5;' : '' }}"
                                        {{ $item->category_quantity == 0 ? 'disabled' : '' }}>Thêm vào giỏ hàng</button>
                            </form>
                            @if ($favo)
                                <form action="{{ URL::to('/remove-from-favorite/' . $item->category_id) }}#pro"
                                    method="GET">
                                    @csrf
                                    <button style="border-style:none;" type="submit" class="heart-icon">
                                        <span class="icon_heart"></span>
                                    </button>
                                </form>
                            @else
                                <form action="{{ URL::to('/add-to-favorite/' . $item->category_id) }}#pro" method="POST">
                                    @csrf
                                    <button style="border-style:none;" type="submit" class="heart-icon">
                                        <span class="icon_heart_alt"></span>
                                    </button>
                                </form>
                            @endif
                        </div>
                        <ul>
                            <li>
                                <b>Tình trạng</b>
                                <label class="badge" data-quantity="{{ $item->category_quantity }}"></label>
                            </li>
                        </ul>
                    </div>
                </div>
        </div>
        @endforeach
        </div>
    </section>
    <!-- Product Details Section End -->
@endsection
