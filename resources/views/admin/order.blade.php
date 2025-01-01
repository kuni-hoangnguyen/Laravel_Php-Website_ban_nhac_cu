@extends('admin_layout')
@section('admin_content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh Sách Đơn Hàng</h4>
                    <div class="table-responsive">
                        <table class="table">
                            @php
                                $message = Session::get('message');
                                if ($message) {
                                    echo '<div class="alert alert-success alert-dismissible">';
                                    echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                                    echo '<strong>Success!</strong> ' . $message;
                                    echo '</div>';
                                    Session::forget('message');
                                }
                            @endphp
                            <thead>
                                <tr>
                                    <th>Mã đơn</th>
                                    <th>Tên người đặt</th>
                                    <th>Tổng tiền</th>
                                    <th>Thanh toán</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày giao</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ $item->checkout_id }}</td>
                                        <td>{{ $item->checkout_name }}</td>
                                        <td>{{ number_format($item->checkout_total) }}đ</td>
                                        <td>{{ $item->checkout_payment_method }}</td>
                                        <td>
                                            <form method="GET"
                                                action="{{ URL::to('/update-order/' . $item->checkout_id) }}">
                                                @csrf
                                                <select class="badge" name="checkout_status" onchange="this.form.submit()">
                                                    <option value="1"
                                                        {{ $item->checkout_status == 1 ? 'selected' : '' }}>
                                                        Chờ xác nhận
                                                    </option>
                                                    <option value="2"
                                                        {{ $item->checkout_status == 2 ? 'selected' : '' }}>
                                                        Đang giao hàng
                                                    </option>
                                                    <option value="3"
                                                        {{ $item->checkout_status == 3 ? 'selected' : '' }}>
                                                        Đã giao hàng
                                                    </option>
                                                    <option value="4"
                                                        {{ $item->checkout_status == 4 ? 'selected' : '' }}>
                                                        Đã hủy
                                                    </option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                        <td>
                                            @if (empty($item->delivery_date))
                                                Đang xử lý
                                            @else
                                                {{ \Carbon\Carbon::parse($item->delivery_date)->format('d/m/Y') }}
                                            @endif

                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ URL::to('/order-details/' . $item->checkout_id) }}">
                                                <i class="mdi mdi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
