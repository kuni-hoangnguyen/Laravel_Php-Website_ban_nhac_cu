<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_info')->insert([
            'phone' => '+84 471.120.XXX',
            'address' => '300A – Nguyễn Tất Thành, Phường 13, Quận 4, TP. Hồ Chí Minh, Việt Nam',
            'minimap' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62706.05575637603!2d106.6631617174663!3d10.801470123154756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f6f49df11ad%3A0xa5a5beda991d13c5!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBOZ3V54buFbiBU4bqldCBUaMOgbmg!5e0!3m2!1svi!2s!4v1734472895999!5m2!1svi!2s',
            'work_time' => '9:00 - 22:00',
            'email' => 'seniks@kuni.com',
        ]);
    }
}
