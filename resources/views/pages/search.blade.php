@extends('layout')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ URL::asset('frontend/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Sản Phẩm</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ URL::to('/home') }}">Trang chủ </a>
                            <span>Sản phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Product Section Begin -->
    <section class="product spad" id="product-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Danh mục sản phẩm</h4>
                            <ul>
                                <li>
                                    <a href="{{ URL::to('/shop') }}">Tất cả sản phẩm</a>
                                </li>
                                @foreach ($all_type as $type)
                                    <li><a
                                            href="{{ URL::to('/category_type/' . $type->id_type) }}">{{ $type->category_type }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Mức giá</h4>
                            <form method="GET" action="{{ url('search') }}#product-section" id="price-filter-form">
                                @csrf
                                <div class="price-range-wrap">
                                    <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                        data-min="0" data-max="15000000" data-step="1000000">
                                        <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                        <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    </div>
                                    <div class="range-slider">
                                        <div class="price-input">
                                            <input type="text" id="minamount" name="minamount" readonly
                                                value="{{ request('minamount', 0) }}">
                                            <input type="text" id="maxamount" name="maxamount" readonly
                                                value="{{ request('maxamount', 15000000) }}">
                                            <input type="hidden" name="keywords_submit" value="{{ $keyword }}">
                                        </div>
                                    </div>
                                </div>
                                <!-- Hidden sort input to keep sort state -->
                                <input type="hidden" name="sort" value="{{ request('sort') }}">
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-5 col-md-5">
                                <div class="filter__sort">
                                    <form method="GET" action="{{ url('shop') }}#product-section">
                                        @csrf
                                        <!-- Include hidden fields to retain filter values -->
                                        <input type="hidden" name="minamount" value="{{ request('minamount') }}">
                                        <input type="hidden" name="maxamount" value="{{ request('maxamount') }}">
                                        <span>Sắp xếp theo</span>
                                        <select id="sort-select" name="sort" onchange="this.form.submit()">
                                            <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>
                                                Mặc định</option>
                                            <option value="price_asc"
                                                {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá: Thấp đến cao
                                            </option>
                                            <option value="price_desc"
                                                {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá: Cao đến thấp
                                            </option>
                                            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>
                                                Tên: A-Z</option>
                                            <option value="name_desc"
                                                {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Tên: Z-A</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{ $count_product }}</span> sản phẩm</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($product as $prd)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg"
                                        data-setbg="{{ URL::asset('images/category/' . $prd->category_image) }}">
                                        <ul class="product__item__pic__hover">
                                            <li>
                                                <form
                                                    action="{{ URL::to('/add-to-favorite/' . $prd->category_id) }}#product-section"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit">
                                                        <i class="fa fa-heart"></i>
                                                    </button>
                                                </form>
                                            </li>
                                            <li>
                                                <form
                                                    action="{{ URL::to('/add-to-cart/' . $prd->category_id) }}#product-section"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit"
                                                        {{ $prd->category_quantity == 0 ? 'disabled' : '' }}
                                                        style="{{ $prd->category_quantity == 0 ? 'background-color:#E5E5E5; border-color:#E5E5E5;' : '' }};">
                                                        <i class="fa fa-shopping-cart"
                                                            style="{{ $prd->category_quantity == 0 ? 'color:black;' : '' }};"></i>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a
                                                href="{{ URL::to('/product/' . $prd->category_id) }}">{{ $prd->category_name }}</a>
                                        </h6>
                                        <h5>{{ number_format($prd->category_price) }}đ</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="product__pagination">
                        {{ $product->appends(request()->except('page'))->links('vendor.pagination.default') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Section End -->
@endsection
