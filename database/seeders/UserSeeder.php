<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tbl_user')->insert([
            'user_email' => 'user@gmail.com',
            'user_password' => md5('123'),
            'user_name' => 'user',
            'user_phone' => '0123456789',
            'user_address' => 'Ea incididunt excepteur ad ut sit ullamco Lorem.',
        ]);
    }
}
