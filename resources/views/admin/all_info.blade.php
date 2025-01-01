@extends('admin_layout')
@section('admin_content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thông tin cửa hàng</h4>
                    <form action="{{ URL::to('/update-info-post/' . $contact_info->info_id) }}" method="POST">
                        @csrf
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
                        <div class="form-group">
                            <label for="phone">SĐT</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ $contact_info->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <textarea class="form-control" id="address" name="address" rows="1">{{ $contact_info->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="minimap">Minimap</label>
                            <textarea class="form-control" id="minimap" name="minimap" rows="3">{{ $contact_info->minimap }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="work_time">Thời gian làm việc</label>
                            <input type="text" class="form-control" id="work_time" name="work_time"
                                value="{{ $contact_info->work_time }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $contact_info->email }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="mdi mdi-content-save"></i> Cập nhật
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
