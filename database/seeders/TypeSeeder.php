<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert data into tbl_type with only the image file name
        DB::table('tbl_type')->insert([
            [
                'category_type' => 'Guitar',
                'image_type' => 'Guitar.png',  
            ],
            [
                'category_type' => 'Loa',
                'image_type' => 'speaker.png', 
            ],
            [
                'category_type' => 'Micro',
                'image_type' => 'microphone.png', 
            ],
            [
                'category_type' => 'Piano',
                'image_type' => 'keyboard.png', 
            ],
            [
                'category_type' => 'Phần mềm',
                'image_type' => 'software.png', 
            ],
            [
                'category_type' => 'Synthesizer',
                'image_type' => 'synthesizer.png', 
            ],
            [
                'category_type' => 'Tai nghe',
                'image_type' => 'headphone.png', 
            ],
            [
                'category_type' => 'Trống',
                'image_type' => 'drums.png', 
            ],
        ]);
    }
}
