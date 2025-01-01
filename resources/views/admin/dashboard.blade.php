@extends('admin_layout')
@section('admin_content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Chi tiết doanh thu</p>
                            <p class="font-weight-500">Tổng số doanh thu, đơn hàng, sản phẩm mà cửa hàng đang có và đã được
                                bán.
                            </p>
                            <div class="d-flex flex-wrap mb-5">
                                <div class="mr-5 mt-3">
                                    <p class="text-muted">Doanh thu</p>
                                    <h3 class="text-primary fs-30 font-weight-medium">{{ $order_total }}</h3>
                                </div>
                                <div class="mr-5 mt-3">
                                    <p class="text-muted">Sản phẩm</p>
                                    <h3 class="text-primary fs-30 font-weight-medium">{{ $category_count }}</h3>
                                </div>
                                <div class="mr-5 mt-3">
                                    <p class="text-muted">Đơn hàng</p>
                                    <h3 class="text-primary fs-30 font-weight-medium">{{ $order_count }}</h3>
                                </div>
                                <div class="mt-3">
                                    <p class="text-muted">Sản phẩm đã bán</p>
                                    <h3 class="text-primary fs-30 font-weight-medium">{{ $qty_sold }}</h3>
                                </div>
                            </div>
                            {{-- <canvas id="order-chart"></canvas> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title mb-0">Sản phẩm nổi bật</p>
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Ngày thêm</th>
                                            <th>Tình trạng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category as $item)
                                            <tr>
                                                <td>{{ \Illuminate\Support\Str::limit($item->category_name, 23, '...') }}
                                                </td>
                                                <td>{{ number_format($item->category_price) }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                                <td>
                                                    <label class="badge"
                                                        data-quantity="{{ $item->category_quantity }}"></label>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title mb-0">Đơn hàng</p>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                        <tr>
                                            <th>Mã đơn</th>
                                            <th>Tên người đặt</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $item)
                                            <tr>
                                                <td>{{ $item->checkout_id }}</td>
                                                <td>{{ $item->checkout_name }}</td>
                                                <td>{{ number_format($item->checkout_total) }}đ</td>
                                                <td>
                                                    <span class="badge" data-status={{ $item->checkout_status }}></span>
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
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh Sách Liên Hệ</h4>
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
                                            <th>Tên người gửi</th>
                                            <th>Emaill</th>
                                            <th>Lời nhắn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item->contact_name }}</td>
                                                <td>{{ $item->contact_email }}</td>
                                                <td>{{ $item->contact_mess }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- partial -->
    </div>
@endsection
