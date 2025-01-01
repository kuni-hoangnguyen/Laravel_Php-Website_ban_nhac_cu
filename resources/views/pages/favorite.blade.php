@extends('layout')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ URL::asset('frontend/img/breadcrumb.jpg') }}" id="spot">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Yêu thích</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ URL::to('/') }}">Trang chủ</a>
                            <span>Yêu thích</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Favorite Section Begin -->
    <section class="favorite spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="favorite__table" id="favo">
                        @if ($data->isEmpty())
                            <div class="alert alert-warning text-center">
                                <strong>Yêu thích trống!</strong> Hãy thêm sản phẩm vào yêu thích để
                                tiếp tục.
                            </div>
                        @else
                            <table>
                                <thead>
                                    <tr>
                                        <th class="favorite__product">Sản phẩm</th>
                                        <th>Tình trạng</th>
                                        <th>Giá</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td class="favorite__item">
                                                <a href="{{ URL::to('/product/' . $item->category_id) }}">
                                                    <img src="{{ URL::asset('images/category/' . $item->category_image) }}"
                                                        alt="">
                                                    <h5>{{ \Illuminate\Support\Str::limit($item->category_name, 40, '...') }}
                                                    </h5>
                                                </a>
                                            </td>
                                            <td class="favorite__status"><label class="badge"
                                                    data-quantity="{{ $item->category_quantity }}"></label>
                                            </td>
                                            <td class="favorite__price"> {{ number_format($item->category_price) }}đ</td>
                                            <td class="favorite__item__close">
                                                <a href="{{ URL::to('/remove-from-favorite/' . $item->category_id) }}#favo"><span
                                                        class="icon_close"></span></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Favorite Section End -->
@endsection
