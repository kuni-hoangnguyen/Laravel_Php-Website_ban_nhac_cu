<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
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
    public function listBanners()
    {
        $this->AuthLogin();
        $all_banner = DB::table('tbl_banner')->get();
        return view('admin.all_banner')->with('all_banner', $all_banner);
    }

    public function updateBanner($id)
    {
        $this->AuthLogin();
        $update_banner = DB::table('tbl_banner')->where('banner_id', $id)->get();
        return view('admin.update_banner')->with('update_banner', $update_banner);
    }

    public function updateBannerPost(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
            'sub_title' => 'nullable|string|max:255',
            'main_title' => 'nullable|string|max:255',
            'short_description' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'sub_title' => $request->sub_title,
            'main_title' => $request->main_title,
            'short_description' => $request->short_description,
        ];

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/banner'), $filename);
            $data['banner_image'] = $filename;
        }

        DB::table('tbl_banner')->where('banner_id', $id)->update($data);

        Session::put('message', 'Cập nhật banner thành công!');

        return Redirect::to('/all-banner');
    }

}
