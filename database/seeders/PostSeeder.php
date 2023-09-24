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
            'photo_1' => 'tetsuban_S.jpg',
            'photo_2' => 'tetsuban_L.jpg',
            'memo' => '道路に穴が開いている。',
            'status' => '',
            'admin_comment' => '',

        ]);

        $param = [
            [
                'discovery_day' => date('Y-m-d H:i:s'),
                'lat' => '39.8723',
                'lng' => '141.2181',
                'category' => '倒木',
                'photo_1' => 'road1.jpg',
                'photo_2' => 'road2.jpg',
                'memo' => '木が倒れている',
                'status' => '',
                'admin_comment' => '',
            ],
            [
                'discovery_day' => date('Y-m-d H:i:s'),
                'lat' => '38.9951',
                'lng' => '141.1187',
                'category' => '舗装穴',
                'photo_1' => 'road3.jpg',
                'photo_2' => 'road4.jpg',
                'memo' => '穴が空いている',
                'status' => '',
                'admin_comment' => '',
            ],
            [
                'discovery_day' => date('Y-m-d H:i:s'),
                'lat' => '38.5951',
                'lng' => '141.1187',
                'category' => '舗装穴',
                'photo_1' => 'road5.jpg',
                'photo_2' => 'road6.jpg',
                'memo' => '穴が空いている',
                'status' => '',
                'admin_comment' => '',
            ],
            [
                'discovery_day' => date('Y-m-d H:i:s'),
                'lat' => '38.9951',
                'lng' => '141.7187',
                'category' => '舗装穴',
                'photo_1' => 'haisui_S.jpg',
                'photo_2' => 'haisui_L.jpg',
                'memo' => '穴が空いている',
                'status' => '',
                'admin_comment' => '',
            ],
            [
                'discovery_day' => date('Y-m-d H:i:s'),
                'lat' => '38.9651',
                'lng' => '141.4187',
                'category' => '舗装穴',
                'photo_1' => 'hansya_L.jpg',
                'photo_2' => 'hansya_S.jpg',
                'memo' => '穴が空いている',
                'status' => '',
                'admin_comment' => '',
            ],
            
        ];
        DB::table('posts')->insert($param);
    }
}
