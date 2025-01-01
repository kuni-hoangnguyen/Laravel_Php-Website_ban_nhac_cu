<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class CategoryController extends Controller
{
    //Begin Admin function
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/admin')->send();
        }
    }
    public function addCategory()
    {
        $this->AuthLogin();
        return view('admin.add_category');
    }

    public function listCategory()
    {
        $this->AuthLogin();
        $category = DB::table('tbl_category')
            ->join('tbl_type', 'tbl_category.category_type', '=', 'tbl_type.id_type')
            ->select('tbl_category.*', 'tbl_type.category_type as type_name')
            ->get();
        return view('admin.all_category', compact('category'));
    }

    public function addCategoryPost(Request $request)
    {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['category_type'] = $request->category_type;
        $data['category_quantity'] = $request->category_quantity;
        $data['category_price'] = $request->category_price;

        if ($request->hasFile('category_image')) {
            $file = $request->file('category_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/category'), $filename);
            $data['category_image'] = $filename;
        }

        DB::table('tbl_category')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công!');
        return Redirect::to('/add-category');
    }

    public function updateCategory($id)
    {
        $this->AuthLogin();
        $update_category = DB::table('tbl_category')->where('category_id', $id)->get();
        return view('admin.update_category', compact('update_category'));
    }

    public function updateCategoryPost(Request $request, $id)
    {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['category_type'] = $request->category_type;
        $data['category_quantity'] = $request->category_quantity;
        $data['category_price'] = $request->category_price;

        if ($request->hasFile('category_image')) {
            $file = $request->file('category_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/category'), $filename);
            $data['category_image'] = $filename;
        }

        DB::table('tbl_category')->where('category_id', $id)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công!');
        return Redirect::to('/all-category');
    }

    public function deleteCategory($id)
    {
        $this->AuthLogin();
        DB::table('tbl_category')->where('category_id', $id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công!');
        return Redirect::to('/all-category');
    }

    //End Admin function

}
