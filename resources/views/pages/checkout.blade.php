@extends('layout') @section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ URL::asset('frontend/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Thanh Toán</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ URL::to('/') }}">Trang chủ</a>
                            <span>Thanh toán</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            @php
                $content = Cart::content();
            @endphp
            <div class="checkout__form">
                <h4>Chi tiết đơn hàng</h4>
                <form action="{{ URL::to('/order-confirm') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__input">
                                <p>Họ và tên<span>*</span></p>
                                <input type="text" name="checkout_name" value="{{ $user->user_name }}" required>
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" name="checkout_address" value="{{ $user->user_address }}" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>SĐT<span>*</span></p>
                                        <input type="text" name="checkout_phone" value="{{ $user->user_phone }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phương thức thanh toán<span>*</span></p>
                                        <select class="w-100" name="checkout_payment_method">
                                            <option value="Delivery">Thanh toán khi nhận hàng
                                            </option>
                                            <option value="Paypal">Thanh toán qua Paypal
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Ghi chú<span></span></p>
                                <input type="text" name="checkout_description">
                            </div>
                            <input type="hidden" name="user_id" value="{{ $user->user_id }}">

                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__order">
                                <h4>Đơn hàng của bạn</h4>
                                <div class="checkout__order__products">Sản phẩm <span>Tổng</span>
                                </div>
                                <ul>
                                    @foreach ($content as $item)
                                        <li>{{ \Illuminate\Support\Str::limit($item->name, 25, '...') }}(Qty:
                                            {{ $item->qty }})
                                            <span> @php
                                                $subtotal = $item->price * $item->qty;
                                                echo number_format($subtotal);
                                            @endphp</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">Tổng <span>{{ Cart::subtotal() }}</span>
                                </div>
                                <div class="checkout__order__total">Thành tiền <span>{{ Cart::total() }}</span></div>
                                <button type="submit" class="site-btn" id="btn-checkout">THANH
                                    TOÁN</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
