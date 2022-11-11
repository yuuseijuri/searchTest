<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert([
        'id' => '1',
        'category' => 'Laravel'
        ]);

        \DB::table('categories')->insert([
        'id' => '2',
        'category' => 'Web技術'
        ]);

        \DB::table('categories')->insert([
        'id' => '3',
        'category' => 'Git'
        ]);
    }
}
