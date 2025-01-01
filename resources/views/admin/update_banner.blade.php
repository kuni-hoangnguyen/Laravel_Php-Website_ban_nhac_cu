@extends('admin_layout')
@section('admin_content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container" style="justify-content: center; display: flex;">
                <div class="col-7 grid-margin stretch-card">
                    <div class="card">
                        @foreach ($update_banner as $update_value)
                            <div class="card-body">
                                <h4 class="card-title">Cập nhật thông tin Banner</h4>
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
                                <form class="forms-sample"
                                    action="{{ URL::to('/update-banner-post/' . $update_value->banner_id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <!-- Banner Image -->
                                    <div class="form-group">
                                        <label>Hình ảnh Banner</label>
                                        <input type="file" name="banner_image" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled
                                                placeholder="{{ $update_value->banner_image }}">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button">Tải
                                                    ảnh</button>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Sub Title -->
                                    <div class="form-group">
                                        <label for="sub_title">Tiêu đề phụ</label>
                                        <input type="text" class="form-control" id="sub_title" name="sub_title"
                                            value="{{ $update_value->sub_title }}">
                                    </div>

                                    <!-- Main Title -->
                                    <div class="form-group">
                                        <label for="main_title">Tiêu đề chính</label>
                                        <input type="text" class="form-control" id="main_title" name="main_title"
                                            value="{{ $update_value->main_title }}">
                                    </div>

                                    <!-- Short Description -->
                                    <div class="form-group">
                                        <label for="short_description">Miêu tả ngắn</label>
                                        <textarea class="form-control" id="short_description" rows="4" name="short_description">{{ $update_value->short_description }}</textarea>
                                    </div>

                                    <!-- Submit Button -->
                                    <div style="justify-content: center; display: flex;">
                                        <button type="submit" class="btn btn-primary" style="width: 100%">Cập nhật</button>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
