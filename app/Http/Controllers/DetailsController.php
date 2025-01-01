<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DetailsController extends Controller
{
    public function listDetails($id)
    {
        $user_id = Session::get('user_id');

        $productDetails = DB::table('tbl_category')
            ->where('category_id', $id)
            ->join('tbl_type', 'tbl_category.category_type', '=', 'tbl_type.id_type')
            ->select('tbl_category.*', 'tbl_type.category_type as type_name')
            ->get();
        $productType = $productDetails->first()->type_name;

        $favo = DB::table('tbl_favorite')->where('user_id', $user_id)->where('category_id', $id)->first();

        return view('pages.productDetails', compact('productDetails', 'productType', 'favo'));
    }
}
