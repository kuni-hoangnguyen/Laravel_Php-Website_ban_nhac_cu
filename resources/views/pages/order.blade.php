@extends('layout') @section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ URL::asset('frontend/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Đơn hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ URL::to('/') }}">Trang chủ</a>
                            <span>Đơn hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Order Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        @if ($orders->isEmpty())
                            <div class="alert alert-warning text-center">
                                <strong>Bạn chưa có đơn hàng nào!</strong> Hãy đặt hàng để bắt đầu.
                            </div>
                        @else
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày đặt</th>
                                        <th>Ngày giao</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td class="shoping__cart__item" style="width:35%;">
                                                <a href="{{ URL::to('/product/' . $order->category_id) }}">
                                                    <img src="{{ URL::asset('images/category/' . $order->category_image) }}"
                                                        alt="" style="width: 100px; height:auto;">
                                                    <h5 style="font-weight: 700;">
                                                        {{ \Illuminate\Support\Str::limit($order->category_name, 25, '...') }}
                                                    </h5>
                                                </a>
                                            </td>
                                            <td class="shoping__cart__price" style="font-weight:normal;">
                                                {{ number_format($order->order_price) }}đ</td>
                                            <td class="shoping__cart__quantity" style="font-size: 18px; width:auto">
                                                {{ $order->category_quantity }}</td>
                                            <td class="shoping__cart__total" style="font-weight:normal;">
                                                {{ number_format($order->order_price * $order->category_quantity) }}đ
                                            </td>
                                            <td class="shoping__cart__status">
                                                <span class="badge" data-status={{ $order->checkout_status }}>
                                                </span>
                                            </td>
                                            <td class="shoping__cart__date">
                                                {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                                            <td class="shoping__cart__delivery-date">
                                                {{ $order->delivery_date ? \Carbon\Carbon::parse($order->delivery_date)->format('d/m/Y') : 'Đang xử lý' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Order End -->
@endsection
