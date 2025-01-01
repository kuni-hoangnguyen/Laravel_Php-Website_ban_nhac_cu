@extends('admin_layout')
@section('admin_content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container" style="justify-content: center; display: flex;">
                <div class="col-9 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh Sách Loại Sản Phẩm</h4>

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

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tên Loại</th>
                                        <th>Hình Ảnh</th>
                                        <th>Ngày thêm</th>
                                        <th>Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_type as $type)
                                        <tr>
                                            <td>{{ $type->category_type }}</td>
                                            <td><img src="{{ asset('images/type/' . $type->image_type) }}" width="100"
                                                    style="border-radius: 0%" alt="Image"></td>
                                            <td>{{ \Carbon\Carbon::parse($type->created_at)->format('d/m/Y') }}</td>
                                            <td>
                                                <a href="{{ URL::to('/update-type/' . $type->id_type) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="mdi mdi-lead-pencil"></i></a>
                                                <a class="btn btn-danger btn-sm"
                                                    href="{{ URL::to('/delete-type/' . $type->id_type) }}"
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
    </div>
@endsection
