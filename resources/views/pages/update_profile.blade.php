@extends('layout')
@section('content')
    <!-- Profile Form Begin -->
    <section class="vh-10">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-8 mb-6 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <form action="{{ URL::to('/update-profile-post') }}" method="POST">
                            @csrf
                            <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-white"
                                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                    <img src="{{ URL::asset('frontend/img/ava.png') }}" alt="Avatar"
                                        class="img-fluid my-5" style="width: 80px; border-radius:50%" />
                                    <input class="gradient-custom" style="border-radius:.5rem " type="text"
                                        name="user_name" value="{{ $user->user_name }}" required>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <h6>Thông tin cá nhân</h6>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <label for="user_email" class="form-label">Email</label>
                                                <input type="email" id="user_email" name="user_email" class="form-control"
                                                    value="{{ $user->user_email }}" required>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="user_phone" class="form-label">Số điện thoại</label>
                                                <input type="text" id="user_phone" name="user_phone" class="form-control"
                                                    value="{{ $user->user_phone }}" required>
                                            </div>
                                        </div>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-12 mb-3">
                                                <label for="user_address" class="form-label">Địa chỉ</label>
                                                <textarea id="user_address" name="user_address" class="form-control" rows="3" required>{{ $user->user_address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn"
                                                style="background:#bda455 ; border-color:#bda455 ;color:#fff;">Lưu thông
                                                tin</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Profile Form End -->
@endsection
