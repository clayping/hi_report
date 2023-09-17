<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            [
                'name' => 'ばん こうた',
                'email' => 'aaa@aaaa',
                'password' => 'password',
            ],
            [
                'name' => 'きくや はるか',
                'email' => 'bbb@bbbb',
                'password' => 'password',
            ],
            [
                'name' => 'きくかわ のりこ',
                'email' => 'ccc@cccc',
                'password' => 'password',
            ],
            
        ];
        DB::table('users')->insert($param);
    }
}
