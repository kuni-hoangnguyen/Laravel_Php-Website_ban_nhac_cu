@extends('admin_layout')
@section('admin_content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh Sách Sản Phẩm</h4>
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
                                    <th>Phân loại</th>
                                    <th>Giá tiền</th>
                                    <th>Đánh giá</th>
                                    <th>Số lượng</th>
                                    <th>Tình trạng</th>
                                    <th>Ngày thêm</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $category => $item)
                                    <tr>
                                        <td><img src="{{ URL::asset('images/category/' . $item->category_image) }}"
                                                alt="Product Image" style="width: 50px; height: 50px;border-radius:0;"></td>
                                        <td>{{ \Illuminate\Support\Str::limit($item->category_name, 23, '...') }}</td>
                                        <td>{{ $item->type_name }}</td>
                                        <td>{{ number_format($item->category_price) }}</td>
                                        <td>{{ $item->category_rating }}</td>
                                        <td>{{ $item->category_quantity }}</td>
                                        <td>
                                            <label class="badge" data-quantity="{{ $item->category_quantity }}"></label>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ URL::to('/update-category/' . $item->category_id) }}">
                                                <i class="mdi mdi-lead-pencil"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ URL::to('/delete-category/' . $item->category_id) }}"
                                                onclick="return confirmDelete(event, this)">
                                                <i class="mdi mdi-delete"></i>
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
