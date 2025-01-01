<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

abstract class Controller
{
    public function __construct()
    {

        $contact_info = DB::table('tbl_info')->first();
        $all_type = DB::table('tbl_type')->get();

        view()->share('contact_info', $contact_info);
        view()->share('all_type', $all_type);
    }

}