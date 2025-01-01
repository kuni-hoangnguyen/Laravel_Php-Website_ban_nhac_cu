<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
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

    public function listOrder()
    {
        $this->AuthLogin();
        $orders = DB::table('tbl_checkout')->get();
        return view('admin.order', compact('orders'));
    }

    public function orderDetails($checkout_id)
    {
        $this->AuthLogin();

        $orders = DB::table('tbl_order')
            ->join('tbl_checkout', 'tbl_order.checkout_id', '=', 'tbl_checkout.checkout_id')
            ->join('tbl_category', 'tbl_order.category_id', '=', 'tbl_category.category_id')
            ->where('tbl_checkout.checkout_id', $checkout_id)
            ->select(
                'tbl_category.category_id',
                'tbl_category.category_image',
                'tbl_category.category_name',
                'tbl_order.category_quantity',
                'tbl_order.order_price'
            )
            ->get();

        return view('admin.order_details', compact('orders', 'checkout_id'));

    }

    public function updateOrder(Request $request, $checkout_id)
    {
        $this->AuthLogin();
        $status = $request->checkout_status;

        $data = ['checkout_status' => $status];

        if ($status == '3') {
            $data['delivery_date'] = Carbon::now('Asia/Ho_Chi_Minh');
        } else {
            $data['delivery_date'] = null;
        }

        DB::table('tbl_checkout')
            ->where('checkout_id', $checkout_id)
            ->update($data);

        return Redirect::to('/all-order');
    }

    public function orderConfirm(Request $request)
    {

        $dataCheckout = array();
        $dataCheckout['user_id'] = $request->user_id;
        $dataCheckout['checkout_name'] = $request->checkout_name;
        $dataCheckout['checkout_address'] = $request->checkout_address;
        $dataCheckout['checkout_phone'] = $request->checkout_phone;
        $dataCheckout['checkout_description'] = $request->checkout_description;
        $dataCheckout['checkout_total'] = preg_replace('/[^0-9.]+/', '', Cart::total());
        $dataCheckout['checkout_status'] = 1;
        $dataCheckout['checkout_payment_method'] = $request->checkout_payment_method;

        if (!preg_match("/^0\d{9}$/", $dataCheckout['checkout_phone'])) {
            Session::put('warning', 'Số điện thoại không hợp lệ!');
            return Redirect::to('/checkout');
        }

        $checkout_id = DB::table('tbl_checkout')->insertGetId($dataCheckout);

        foreach (Cart::content() as $item) {
            $dataOrder = array();
            $dataOrder['checkout_id'] = $checkout_id;
            $dataOrder['category_id'] = $item->id;
            $dataOrder['category_quantity'] = $item->qty;
            $dataOrder['order_price'] = $item->price * $item->qty;

            DB::table('tbl_category')
                ->where('category_id', $dataOrder['category_id'])
                ->update([
                    'category_quantity' => DB::raw('category_quantity - ' . $dataOrder['category_quantity']),
                ]);

            DB::table('tbl_order')->insert($dataOrder);
        }

        Session::put('message', 'Đặt hàng thành công!');
        Cart::destroy();
        return Redirect::to('/order');
    }

    public function order()
    {
        $userId = Session::get('user_id');
        $orders = DB::table('tbl_order')
            ->join('tbl_checkout', 'tbl_order.checkout_id', '=', 'tbl_checkout.checkout_id')
            ->join('tbl_category', 'tbl_order.category_id', '=', 'tbl_category.category_id')
            ->where('tbl_checkout.user_id', $userId)
            ->select(
                'tbl_category.category_id',
                'tbl_category.category_image',
                'tbl_category.category_name',
                'tbl_order.category_quantity',
                'tbl_order.order_price',
                'tbl_checkout.checkout_status',
                'tbl_checkout.created_at',
                'tbl_checkout.delivery_date'
            )
            ->orderBy('tbl_checkout.created_at', 'desc')->get();

        return view('pages.order', compact('orders'));
    }

}
