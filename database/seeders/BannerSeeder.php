<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert banner data
        DB::table('tbl_banner')->insert([
            [
                'banner_image' => 'banner-1.jpg',
                'sub_title' => 'Âm nhạc Tươi Mới',
                'main_title' => 'Phong Cách<br />Hoàn Hảo',
                'short_description' => 'Sản phẩm đa dạng, phục vụ mọi nhu cầu âm nhạc',
            ],
            [
                'banner_image' => 'banner-2.jpg',
                'sub_title' => null, // No subtitle
                'main_title' => null, // No main title
                'short_description' => null, // No description
            ],
            [
                'banner_image' => 'banner-3.jpg',
                'sub_title' => null, // No subtitle
                'main_title' => null, // No main title
                'short_description' => null, // No description
            ],
        ]);
    }
}
