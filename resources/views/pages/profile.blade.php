@extends('layout')
@section('content')
    <!-- Profile Begin -->
    <section class="vh-10">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-8 mb-6 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="{{ URL::asset('frontend/img/ava.png') }}" alt="Avatar" class="img-fluid my-5"
                                    style="width: 80px; border-radius:50%" />
                                <h5>{{ $user->user_name }}</h5>
                                <a href="{{ URL::to('/update-profile') }}">
                                    <i class="fa fa-pencil mb-5"></i>
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Thông tin cá nhân</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted">{{ $user->user_email }}</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Số điện thoại</h6>
                                            <p class="text-muted">{{ $user->user_phone }}</p>
                                        </div>
                                    </div>
                                    <h6></h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-12 mb-6">
                                            <h6>Địa chỉ</h6>
                                            <p class="text-muted">{{ $user->user_address }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Profile End -->
@endsection
