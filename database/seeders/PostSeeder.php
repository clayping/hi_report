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

        $param = [
            [
                'discovery_day' => date('Y-m-d H:i:s'),
                'lat' => '98.9723',
                'lng' => '41.1181',
                'category' => '倒木',
                'photo_1' => '20230916105826_person.jpg',
                'photo_2' => 'sky2.jpg',
                'memo' => '木が倒れている',
                'status' => '',
                'admin_comment' => '',
            ],
            [
                'discovery_day' => date('Y-m-d H:i:s'),
                'lat' => '28.9723',
                'lng' => '81.1181',
                'category' => '舗装穴',
                'photo_1' => 'person1.jpg',
                'photo_2' => 'sky3.jpg',
                'memo' => '穴が空いている',
                'status' => '',
                'admin_comment' => '',
            ]
        ];
        DB::table('posts')->insert($param);
    }
}
