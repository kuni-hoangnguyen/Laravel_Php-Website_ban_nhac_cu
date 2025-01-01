@extends('layout') @section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ URL::asset('frontend/img/breadcrumb.jpg') }}" id="spot">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ Hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ URL::to('/') }}">Trang chủ</a>
                            <span>Giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        @php
                            $content = Cart::content();
                        @endphp
                        @if ($content->isEmpty())
                            <div class="alert alert-warning text-center">
                                <strong>Giỏ hàng trống!</strong> Hãy thêm sản phẩm vào giỏ hàng để tiếp tục.
                            </div>
                        @else
                            <form action="{{ URL::to('/update-cart') }}" method="POST">
                                @csrf
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="shoping__product">Sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Tổng</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($content as $item)
                                            <tr>
                                                <td class="shoping__cart__item">
                                                    <a href="{{ URL::to('/product/' . $item->id) }}">
                                                        <img src="{{ URL::asset('images/category/' . $item->options->image) }}"
                                                            alt="" style="width: 100px; height:auto;">
                                                        <h5 style="font-weight: 700;">
                                                            {{ \Illuminate\Support\Str::limit($item->name, 25, '...') }}
                                                        </h5>
                                                    </a>
                                                </td>
                                                <td class="shoping__cart__price">{{ number_format($item->price) }}đ </td>
                                                <td class="shoping__cart__quantity">
                                                    <div class="quantity">
                                                        <div class="pro-qty">
                                                            <input name="qty[{{ $item->rowId }}]" type="number"
                                                                value="{{ $item->qty }}" min="1"
                                                                max="{{ $item->weight }}"
                                                                {{ $item->weight == 0 ? 'disabled' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="shoping__cart__total">
                                                    @php
                                                        $subtotal = $item->price * $item->qty;
                                                        echo number_format($subtotal), 'đ';
                                                    @endphp
                                                </td>
                                                <td class="shoping__cart__item__close">
                                                    <a href="{{ URL::to('/delete-from-cart/' . $item->rowId) }}#spot"><span
                                                            class="icon_close"></span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="shoping__cart__price" style="color:red;">Tổng</td>
                                            <td class="shoping__cart__total" style="color:red;">{{ Cart::subtotal() }}đ
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="row mt-5">
                                    <div class="col-lg-12">
                                        <div class="shoping__cart__btns">
                                            <a href="{{ URL::to('/checkout') }}"
                                                class="primary-btn cart-btn cart-btn-right"
                                                style="color:#fff; background:#bda455; "> Thanh toán</a>
                                            <button type="submit" class="primary-btn cart-btn" id="btn_update"
                                                style="border-style:none;float: right;margin-right:20px;"><span
                                                    class="icon_loading"></span>
                                                Cập nhật giỏ
                                                hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shoping Cart Section End -->
@endsection
