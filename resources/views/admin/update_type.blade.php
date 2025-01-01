@extends('admin_layout')
@section('admin_content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container" style="justify-content: center; display: flex;">
                <div class="col-7 grid-margin stretch-card">
                    <div class="card">
                        @foreach ($update_type as $update => $update_value)
                            <div class="card-body">
                                <h4 class="card-title">Sửa thông tin loại</h4>
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
                                <form class="forms-sample" action="{{ URL::to('/update-type-post/' . $update_value->id_type) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="category_type">Tên Loại Sản Phẩm</label>
                                        <input type="text" class="form-control" name="category_type"
                                            value="{{ old('category_type', $update_value->category_type) }}">
                                        @error('category_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file" name="image_type" class="file-upload-default"
                                            value="{{ $update_value->image_type }}">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled
                                                placeholder="{{ $update_value->image_type }}">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button">Tải
                                                    ảnh</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div style="justify-content: center; display: flex;">
                                        <button type="submit" class="btn btn-primary" style="width: 100%">Thay đổi</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
@endsection
