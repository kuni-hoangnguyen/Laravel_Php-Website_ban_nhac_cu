<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function loginCheckout()
    {
        $form_active = 'form-login';
        return view('pages.loginCheckout', compact('form_active'));
    }

    public function login(Request $request)
    {
        $user_email = $request->user_email;
        $user_password = md5($request->user_password);

        $result = DB::table('tbl_user')->where('user_email', $user_email)->where('user_password', $user_password)->first();

        if ($result) {
            Session::put('user_id', $result->user_id);
            Session::put('user_name', $result->user_name);
            return Redirect::to('/checkout');
        } else {
            Session::put('error', 'Tài khoản hoặc mật khẩu bị sai!');
            return Redirect::to('/login-checkout');
        }
    }
    public function signUp(Request $request)
    {
        $form_active = 'form-sign-up';
        $user_email = $request->user_email;
        $user_password = $request->user_password;
        $user_password_confirm = $request->user_password_confirm;

        $emailExists = DB::table('tbl_user')->where('user_email', $user_email)->exists();
        if ($emailExists) {
            Session::put('error', 'Email đã tồn tại!');
            return view('pages.loginCheckout', compact('form_active'));
        }

        if ($user_password !== $user_password_confirm) {
            Session::put('error', 'Mật khẩu không trùng khớp!');
            return view('pages.loginCheckout', compact('form_active'));
        }

        $hashed_password = md5($user_password);

        $data = [
            'user_email' => $user_email,
            'user_password' => $hashed_password,
        ];

        $insertUser = DB::table('tbl_user')->insert($data);

        Session::put('message', 'Tạo tài khoản thành công!');

        $form_active = 'form-login';
        return view('pages.loginCheckout', compact('form_active'));
    }

    public function checkout()
    {
        $user_id = Session::get('user_id');
        $user = DB::table('tbl_user')->where('user_id', $user_id)->first();

        if ($user_id && Cart::total() > 0) {
            return view('pages.checkout', compact('user'));
        } else if ($user_id) {
            return Redirect::to('/');
        } else {
            return Redirect::to('/login-checkout')->send();
        }

    }

}
