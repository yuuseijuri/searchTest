<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('media')->insert([
        'id' => '1',
        'medium' => 'Udemy'
        ]);

        \DB::table('media')->insert([
        'id' => '2',
        'medium' => '書籍'
        ]);

        \DB::table('media')->insert([
        'id' => '3',
        'medium' => 'Techpit'
        ]);
    }
}
