<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert data into tbl_admin
        DB::table('tbl_admin')->insert([
            'admin_email' => 'admin@gmail.com',
            'admin_password' => md5('123'), // Store the md5 hash of the password
            'admin_name' => 'Admin',
            'admin_phone' => '0123456789', // Example phone number, change as needed
        ]);
    }
}
