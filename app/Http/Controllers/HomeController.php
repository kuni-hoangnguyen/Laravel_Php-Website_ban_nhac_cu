<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {

        $hero_banner = DB::table('tbl_banner')->where('banner_id', 1)->get();
        $banners = DB::table('tbl_banner')->where('banner_id', '>', 1)->get();

        $featured_product = DB::table('tbl_category')->where('category_quantity', '>', 0)->where('category_quantity', '<', 30)->orderby('category_rating', 'DESC')->limit(8)->get();
        $new_product1 = DB::table('tbl_category')->orderby('category_id', 'DESC')->limit(3)->offset(0)->get();
        $new_product2 = DB::table('tbl_category')->orderby('category_id', 'DESC')->limit(3)->offset(3)->get();
        $top_product1 = DB::table('tbl_category')->orderby('category_rating', 'DESC')->limit(3)->offset(0)->get();
        $top_product2 = DB::table('tbl_category')->orderby('category_rating', 'DESC')->limit(3)->offset(3)->get();

        $excludedCategoryIds = array_merge(
            $featured_product->pluck('category_id')->toArray(),
            $new_product1->pluck('category_id')->toArray(),
            $new_product2->pluck('category_id')->toArray(),
            $top_product1->pluck('category_id')->toArray(),
            $top_product2->pluck('category_id')->toArray()
        );

        $other_product = DB::table('tbl_category')
            ->whereNotIn('category_id', $excludedCategoryIds)
            ->inRandomOrder()
            ->limit(6)
            ->get();
        $other_product1 = $other_product->slice(0, 3);
        $other_product2 = $other_product->slice(3, 3);

        return view('pages.home',
            compact('hero_banner', 'banners', 'featured_product', 'new_product1', 'top_product1', 'other_product1', 'top_product2',
                'other_product2', 'new_product2', 'top_product2'));
    }

}