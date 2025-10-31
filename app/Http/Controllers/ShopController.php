<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query         = DB::table('tbl_category');
        $count_product = $query->count();

        // Apply sorting
        if ($request->has('sort') && ! empty($request->sort)) {
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
            if (! $request->minamount || ! $request->maxamount) {
                $minPrice = 0;
                $maxPrice = 15000000;
            } else {
                $minPrice = (int) preg_replace('/\D/', '', $request->minamount);
                $maxPrice = (int) preg_replace('/\D/', '', $request->maxamount);

            }
            $query->whereBetween('category_price', [$minPrice, $maxPrice]);
            $count_product = $query->count();
        }

        $product = $query->paginate(12);

        return view('pages.shop', compact('product', 'count_product'));
    }

}
