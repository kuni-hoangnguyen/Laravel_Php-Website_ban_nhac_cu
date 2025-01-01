<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function listCart()
    {
        $cartItems = Cart::content();
        $cartIds = $cartItems->pluck('id');

        $products = DB::table('tbl_category')
            ->whereIn('category_id', $cartIds)
            ->get();

        foreach ($cartItems as $cartItem) {
            $product = $products->firstWhere('category_id', $cartItem->id);

            if (!$product) {
                Cart::remove($cartItem->rowId);
                continue;
            }

            if ($product->category_quantity == 0) {
                Cart::remove($cartItem->rowId);
            } else if ($cartItem->weight != $product->category_quantity) {
                if ($cartItem->qty > $product->category_quantity) {
                    Cart::update($cartItem->rowId, $product->category_quantity);
                }
                Cart::update($cartItem->rowId, ['weight' => $product->category_quantity]);
            }
        }

        return view('pages.cart');
    }

    public function addToCart(Request $request, $productId, $qty = 1)
    {
        $qty = $request->has('qty') ? $request->qty : $qty;
        $product_info = DB::table('tbl_category')->where('category_id', $productId)->first();

        $data['id'] = $productId;
        $data['name'] = $product_info->category_name;
        $data['qty'] = $qty;
        $data['price'] = $product_info->category_price;
        $data['weight'] = $product_info->category_quantity; //max-quantity
        $data['options']['image'] = $product_info->category_image;
        Cart::add($data);

        Session::put('message', 'Đã thêm vào giỏ hàng thành công!');

        return redirect()->back();

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
    }

    public function deleteFromCart($rowId)
    {
        Cart::remove($rowId);
        Session::put('message', 'Xóa khỏi giỏ hàng thành công!');
        return Redirect::to('/cart');
    }

    public function updateCart(Request $request)
    {
        foreach ($request->qty as $rowId => $qty) {
            Cart::update($rowId, $qty);
        }
        Session::put('message', 'Cập nhật giỏ hàng thành công!');
        return Redirect::to('/cart');
    }
}
