<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function AuthLogin()
    {
        $user_id = Session::get("user_id");
        if ($user_id) {
            return Redirect::to('/');
        } else {
            return Redirect::to('/login-form')->send();
        }
    }

    public function AuthProfile()
    {
        $user_id = Session::get('user_id');
        $user = DB::table('tbl_user')->where('user_id', $user_id)->first();

        if ($user) {
            foreach ($user as $key => $value) {
                if (is_null($value)) {
                    return Redirect::to('/update-profile')->send();
                }
            }
        }
    }

    public function loginForm()
    {
        $form_active = 'form-login';
        return view('pages.login', compact('form_active'));
    }

    public function login(Request $request)
    {
        $user_email = $request->user_email;
        $user_password = md5($request->user_password);

        $result = DB::table('tbl_user')->where('user_email', $user_email)->where('user_password', $user_password)->first();

        if ($result) {
            Session::put('user_id', $result->user_id);
            Session::put('user_name', $result->user_name);
            if (!$result->user_name) {
                return Redirect::to('/update-profile');
            } else {
                return Redirect::to('/');
            }
        } else {
            Session::put('error', 'Tài khoản hoặc mật khẩu bị sai!');
            return Redirect::to('/login-form');
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
            return view('pages.login', compact('form_active'));
        }

        if ($user_password !== $user_password_confirm) {
            Session::put('error', 'Mật khẩu không trùng khớp!');
            return view('pages.login', compact('form_active'));
        }

        $hashed_password = md5($user_password);

        $data = [
            'user_email' => $user_email,
            'user_password' => $hashed_password,
        ];

        $insertUser = DB::table('tbl_user')->insert($data);

        Session::put('message', 'Tạo tài khoản thành công!');

        $form_active = 'form-login';
        return view('pages.login', compact('form_active'));
    }

    public function logout()
    {
        $this->AuthLogin();
        $data = Cart::content();
        $user_id = Session::get('user_id');

        session()->flush();
        return Redirect::to('/');
    }

    public function profile()
    {
        $this->AuthLogin();

        $user_id = Session::get('user_id');
        $user = DB::table('tbl_user')->where('user_id', $user_id)->first();

        if ($user && !$user->user_name) {
            return Redirect::to('/update-profile');
        }

        return view('pages.profile', compact('user'));
    }

    public function updateProfile()
    {
        $this->AuthLogin();
        $user_id = Session::get('user_id');
        $user = DB::table('tbl_user')->where('user_id', $user_id)->first();

        return view('pages.update_profile', compact('user'));
    }

    public function updateProfilePost(Request $request)
    {
        $user_id = Session::get('user_id');
        $data = array();

        $data['user_name'] = $request->user_name;
        $data['user_email'] = $request->user_email;
        $data['user_phone'] = $request->user_phone;
        $data['user_address'] = $request->user_address;

        if (!preg_match("/^0\d{9}$/", $data['user_phone'])) {
            Session::put('warning', 'Số điện thoại không hợp lệ!');
            return Redirect::to('/update-profile');
        }

        DB::table('tbl_user')->where('user_id', $user_id)->update($data);

        Session::put('user_name', $request->user_name);
        Session::put('message', 'Cập nhật thông tin thành công!');

        return Redirect::to('/profile');
    }

}
