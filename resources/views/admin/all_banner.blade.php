@extends('admin_layout')
@section('admin_content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh Sách Banner</h4>
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
                                    <th>Tên Banner</th>
                                    <th>Hình ảnh</th>
                                    <th>Tiêu đề phụ</th>
                                    <th>Tiêu đề chính</th>
                                    <th>Miêu tả ngắn</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_banner as $banner)
                                    <tr>
                                        <td>Banner {{ $loop->iteration }}</td>
                                        <td><img src="{{ URL::asset('images/banner/' . $banner->banner_image) }}"
                                                alt="Banner Image" style="height: 50px;width: auto;border-radius:0;"></td>
                                        <td>{{ $banner->sub_title }}</td>
                                        <td>{{ $banner->main_title }}</td>
                                        <td>{{ $banner->short_description }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ URL::to('/update-banner/' . $banner->banner_id) }}">
                                                <i class="mdi mdi-lead-pencil"></i>
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
