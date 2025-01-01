@extends('admin_layout')
@section('admin_content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh Sách Sản Phẩm Của Đơn Hàng {{ $checkout_id }}</h4>
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
                                    <th>Hình ảnh</th>
                                    <th>Tên</th>
                                    <th>Số lượng</th>
                                    <th>Hóa đơn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td><img src="{{ URL::asset('images/category/' . $item->category_image) }}"
                                                alt="Product Image" style="width: 50px; height: 50px;border-radius:0;"></td>
                                        <td>{{ \Illuminate\Support\Str::limit($item->category_name, 23, '...') }}</td>
                                        <td>{{ $item->category_quantity }}</td>
                                        <td>{{ number_format($item->order_price) }}đ</td>
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
