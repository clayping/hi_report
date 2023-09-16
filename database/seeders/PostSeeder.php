<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //一件追加
        DB::table('posts')->insert([
            'discovery_day' => date('Y-m-d H:i:s'),
            'lat' => '38.9723',
            'lng' => '141.1181',
            'category' => '道路陥没',
            'photo_1' => 'person.jpg',
            'photo_2' => 'sky.jpg',
            'memo' => '道路に穴が開いている。',
            'status' => '',
            'admin_comment' => '',

        ]);
    }
}
