<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class FavoriteController extends Controller
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
    public function myFavorites()
    {

        $user_id = Session::get('user_id');
        $data = DB::table('tbl_favorite')
            ->join('tbl_category', 'tbl_favorite.category_id', '=', 'tbl_category.category_id')
            ->where('tbl_favorite.user_id', $user_id)->select(
            'tbl_category.category_id',
            'tbl_category.category_name',
            'tbl_category.category_image',
            'tbl_category.category_quantity',
            'tbl_category.category_price'
        )->get();

        return view('pages.favorite', compact('data'));
    }
    public function addToFavorite($category_id)
    {
        $this->AuthLogin();
        $user_id = Session::get('user_id');
        $data = array();
        $data['category_id'] = $category_id;
        $data['user_id'] = $user_id;
        if (DB::table('tbl_favorite')->where('user_id', $user_id)->where('category_id', $category_id)->exists()) {
            Session::put('warning', 'Sản phẩm đã tồn tại trong yêu thích!');
            return redirect()->back();
        } else {
            DB::table('tbl_favorite')->insert($data);
            Session::put('message', 'Thêm vào yêu thích thành công!');
            return redirect()->back();
        }

    }

    public function removeFromFavorite($category_id)
    {
        $this->AuthLogin();
        $user_id = Session::get('user_id');
        DB::table('tbl_favorite')->where('user_id', $user_id)->where('category_id', $category_id)->delete();
        Session::put('message', 'Xóa khỏi yêu thích thành công!');
        return redirect()->back();
    }
}
