<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
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
    public function listType()
    {
        $this->AuthLogin();
        return view('admin.all_type');
    }

    public function updateType($id)
    {
        $this->AuthLogin();
        $update_type = DB::table('tbl_type')->where('id_type', $id)->get();
        return view('admin.update_type', compact('update_type'));
    }

    public function updateTypePost(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_type' => 'nullable|string|max:255',
            'image_type' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'category_type' => $request->category_type,
        ];

        if ($request->hasFile('image_type')) {
            $file = $request->file('image_type');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/type'), $filename);
            $data['image_type'] = $filename;
        }

        DB::table('tbl_type')->where('id_type', $id)->update($data);

        Session::put('message', 'Cập nhật thông tin loại sản phẩm thành công!');

        return Redirect::to('/all-type');
    }

    public function addType()
    {
        $this->AuthLogin();
        return view('admin.add_type');
    }

    public function addTypePost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_type' => 'required|string|max:255',
            'image_type' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'category_type' => $request->category_type,
        ];

        if ($request->hasFile('image_type')) {
            $file = $request->file('image_type');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/type'), $filename);
            $data['image_type'] = $filename;
        }

        DB::table('tbl_type')->insert($data);

        Session::put('message', 'Thêm loại sản phẩm thành công!');

        return Redirect::to('/all-type');
    }

    public function deleteType($id)
    {
        $this->AuthLogin();
        DB::table('tbl_type')->where('id_type', $id)->delete();
        Session::put('message', 'Xóa loại sản phẩm thành công!');
        return Redirect::to('/all-type');
    }

    //End Admin function

    //Begin Public function
    public function showCategoryType(Request $request, $id)
    {

        $query = DB::table('tbl_category')->where('category_type', '=', $id);
        $count_product = $query->count();

        if ($request->has('sort') && !empty($request->sort)) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('category_price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('category_price', 'desc');
                    break;
                case 'name_asc':
                    $query->orderBy('category_name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('category_name', 'desc');
                    break;
                default:
                    break;
            }
        } elseif (empty($request->sort)) {
            $query->orderBy('category_id', 'desc');
        }

        if ($request->has('minamount') && $request->has('maxamount')) {
            if (!$request->minamount || !$request->maxamount) {
                $minPrice = 0;
                $maxPrice = 15000000;
            } else {
                $minPrice = (int) str_replace(',', '', $request->minamount);
                $maxPrice = (int) str_replace(',', '', $request->maxamount);
            }
            $query->whereBetween('category_price', [$minPrice, $maxPrice]);
            $count_product = $query->count();
        }

        $product = $query->paginate(12);
        return view('pages.showCategoryType', compact('product', 'count_product'));
    }

}
