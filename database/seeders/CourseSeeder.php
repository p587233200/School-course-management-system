<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course')->insert([
            'teacherID'         => 'T123456789',
            'name'        => '資料庫系統',
            'name'        => '資料庫系統',
            'taID'        => 'M133040021',
        ]);
        DB::table('course')->insert([
            'teacherID'         => 'T123456789',
            'name'        => '分散式計算系統',
            'taID'        => 'M133040001',
        ]);
        DB::table('course')->insert([
            'teacherID'         => 'T123456789',
            'name'        => '作業系統',
            'taID'        => 'M133040001',
        ]);
        DB::table('course')->insert([
            'teacherID'         => 'T123456789',
            'name'        => '網際網路系統',
            'taID'        => 'M133040021',
        ]);
        DB::table('course')->insert([
            'teacherID'         => 'T123456789',
            'name'        => '編譯器製作',
            'taID'        => 'M133040021',
        ]);
        DB::table('course')->insert([
            'teacherID'         => 'T123456789',
            'name'        => '專題製作實驗',
            'taID'        => 'M133040021',
        ]);
        DB::table('course')->insert([
            'teacherID'         => 'T123456788',
            'name'        => '高等網路',
            'taID'        => 'M133040006',
        ]);
        DB::table('course')->insert([
            'teacherID'         => 'T123456787',
            'name'        => 'Unix',
            'taID'        => 'M133040006',
        ]);
        DB::table('course')->insert([
            'teacherID'         => 'T123456787',
            'name'        => '英文寫作',
            'taID'        => 'M133040006',
        ]);
        DB::table('course')->insert([
            'teacherID'         => 'T123456786',
            'name'        => '電子層級設計',
            'taID'        => 'M133040021',
        ]);
    }
}
