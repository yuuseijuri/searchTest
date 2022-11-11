<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeachingMaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('teaching_materials')->insert([
        'id' => '1',
        'name' => 'Git: もう怖くないGit!チーム開発で必要なGitを完全マスター',
        'medium_id' => '1',
        'category_id' => '3'
        ]);

        \DB::table('teaching_materials')->insert([
        'id' => '2',
        'name' => 'PHP+MySQL(MariaDB) Webサーバーサイドプログラミング入門',
        'medium_id' => '1',
        'category_id' => '2'
        ]);

        \DB::table('teaching_materials')->insert([
        'id' => '3',
        'name' => '最短・最速で学ぶFirebase Hosting + Vue Todoアプリ実装',
        'medium_id' => '1',
        'category_id' => '1'
        ]);
    }
}
