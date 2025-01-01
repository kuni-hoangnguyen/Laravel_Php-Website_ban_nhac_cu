@extends('layout')
@section('content')
    <!-- Login Begin -->
    <section class="forms-section">
        <div class="forms">
            <div class="form-wrapper {{ $form_active == 'form-login' ? 'is-active' : '' }}">
                <button type="button" class="switcher switcher-login"> Đăng nhập <span class="underline"></span>
                </button>
                <form class="form form-login" action="{{ URL::to('/login-co') }}" method="POST" name="form-login">
                    @csrf
                    <fieldset>
                        <legend>Hãy nhập tên đăng nhập và mật khẩu của bạn để đăng nhập.</legend>
                        <div class="input-block">
                            <label for="login-user">Email</label>
                            <input id="login-user" type="email" name="user_email" required>
                        </div>
                        <div class="input-block">
                            <label for="login-password">Mật khẩu</label>
                            <input id="login-password" type="password" name="user_password" required>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn-login">Đăng nhập</button>
                </form>
            </div>
            <div class="form-wrapper {{ $form_active == 'form-sign-up' ? 'is-active' : '' }}">
                <button type="button" class="switcher switcher-signup"> Đăng ký <span class="underline"></span>
                </button>
                <form class="form form-signup" action="{{ URL::to('/sign-up-co') }}" method="POST" name="form-sign-up">
                    @csrf
                    <fieldset>
                        <legend>Hãy nhập email, mật khẩu và xác nhận mật khẩu của bạn để đăng ký.</legend>
                        <div class="input-block">
                            <label for="signup-email">Email</label>
                            <input id="signup-email" type="email" name="user_email" required>
                        </div>
                        <div class="input-block">
                            <label for="signup-password">Mật khẩu</label>
                            <input id="signup-password" type="password" name="user_password" required>
                        </div>
                        <div class="input-block">
                            <label for="signup-password-confirm">Xác nhận mật khẩu</label>
                            <input id="signup-password-confirm" type="password" name="user_password_confirm" required>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn-signup">Tiếp tục</button>
                </form>
            </div>
        </div>
    </section>
    <!-- Login End-->
@endsection
