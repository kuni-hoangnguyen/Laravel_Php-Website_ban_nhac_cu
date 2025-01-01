<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class InfoController extends Controller
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
    public function listInfo()
    {
        $this->AuthLogin();
        return view('admin.all_info');
    }

    public function updateInfoPost(Request $request, $id)
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'work_time' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'phone' => $request->phone,
            'address' => $request->address,
            'work_time' => $request->work_time,
            'email' => $request->email,
        ];

        DB::table('tbl_info')->where('info_id', $id)->update($data);

        Session::put('message', 'Cập nhật thông tin liên hệ thành công!');

        return Redirect::to('/all-info');
    }
}
