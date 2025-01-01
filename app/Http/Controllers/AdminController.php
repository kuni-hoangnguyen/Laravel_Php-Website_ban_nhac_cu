<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class AdminController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/admin')->send();
        }
    }

    public function index()
    {
        return view('admin_login');
    }

    public function show_dashboard()
    {
        $this->AuthLogin();
        $category = DB::table('tbl_category')->where('category_quantity', '<', 30)->orderby('category_rating', 'DESC')->limit(8)->get();
        $category_count = DB::table('tbl_category')->count();
        $order_count = DB::table('tbl_checkout')->count();
        $orders = DB::table('tbl_checkout')->get();

        $orders_sold = DB::table('tbl_order')
            ->join('tbl_checkout', 'tbl_order.checkout_id', '=', 'tbl_checkout.checkout_id')
            ->join('tbl_category', 'tbl_order.category_id', '=', 'tbl_category.category_id')
            ->select(
                'tbl_order.category_quantity',
            )
            ->get();

        $qty_sold = 0;
        $order_total = 0;

        foreach ($orders_sold as $order) {
            $qty_sold += $order->category_quantity;
        }

        foreach ($orders as $order) {
            $order_total += $order->checkout_total;
        }

        $qty_sold = $this->formatNumber($qty_sold);
        $order_total = $this->formatNumber($order_total);
        $category_count = $this->formatNumber($category_count);
        $order_count = $this->formatNumber($order_count);
        $data = DB::table('tbl_contact')->orderBy('contact_id', 'desc')->get();

        return view('admin.dashboard', compact('category', 'orders', 'order_total', 'qty_sold', 'order_count', 'category_count', 'data'));
    }

    public function formatNumber($number)
    {
        if ($number >= 1000000) {
            return round($number / 1000000, 1) . 'Tr'; // Format as millions
        } elseif ($number >= 1000) {
            return round($number / 1000, 1) . 'N'; // Format as thousands
        } else {
            return $number; // Return as is for small numbers
        }
    }

    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();

        if ($result) {
            Session::put('admin_id', $result->admin_id);
            Session::put('admin_name', $result->admin_name);
            return Redirect::to('/dashboard');
        } else {
            Session::put('message', 'Tài khoản hoặc mật khẩu bị sai!');
            return Redirect::to('/admin');
        }
    }

    public function logout_admin()
    {
        $this->AuthLogin();
        session()->flush();
        return Redirect::to('/admin');
    }
}
