@extends('admin_layout')
@section('admin_content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container" style="justify-content: center; display: flex;">
                <div class="col-7 grid-margin stretch-card">
                    <div class="card">
                        @foreach ($update_category as $update => $update_value)
                            <div class="card-body">
                                <h4 class="card-title">Sửa thông tin sản phẩm</h4>
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
                                    action="{{ URL::to('/update-category-post/' . $update_value->category_id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="exampleInputName1">Tên sản phẩm</label>
                                            <input type="text" class="form-control" id="exampleInputName1"
                                                name="category_name" value="{{ $update_value->category_name }}" required>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="exampleSelectGender">Phân loại</label>
                                            <select class="form-control" id="exampleSelectGender" name="category_type">
                                                @foreach ($all_type as $type)
                                                    <option value="{{ $type->id_type }}"
                                                        {{ $update_value->category_type == $type->id_type ? 'selected' : '' }}>
                                                        {{ $type->category_type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Miêu tả sản phẩm</label>
                                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="category_description">{{ $update_value->category_description }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="exampleInputCity1">Giá tiền</label>
                                            <input type="float" class="form-control" id="exampleInputCity1" placeholder=""
                                                name="category_price" value="{{ $update_value->category_price }}" required>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="exampleInputCity1">Số lượng</label>
                                            <input type="number" class="form-control" id="exampleInputCity1" placeholder=""
                                                name="category_quantity" value="{{ $update_value->category_quantity }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file" name="category_image" class="file-upload-default"
                                            value="{{ $update_value->category_image }}">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled
                                                placeholder="{{ $update_value->category_image }}">
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
