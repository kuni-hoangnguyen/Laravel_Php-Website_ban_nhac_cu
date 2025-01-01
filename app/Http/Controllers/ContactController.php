<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index()
    {
        $user_id = Session::get("user_id");
        if ($user_id) {
            $data = DB::table('tbl_user')->where('user_id', $user_id)->first();

        } else {
            $columns = DB::getSchemaBuilder()->getColumnListing('tbl_user');
            $data = (object) array_fill_keys($columns, null);
        }
        return view('pages.contact', compact('data'));
    }

    public function submitContactPost(Request $request)
    {
        $data = array();
        $data['contact_name'] = $request->contact_name;
        $data['contact_email'] = $request->contact_email;
        $data['contact_mess'] = $request->contact_mess;

        DB::table('tbl_contact')->insert($data);
        Session::put('message', 'Gửi lời nhắn thành công!');
        return Redirect::to('/contact');
    }

    public function listContact()
    {
        $data = DB::table('tbl_contact')->orderBy('contact_id', 'desc')->get();
        return view('admin.all_contact', compact('data'));
    }
}
