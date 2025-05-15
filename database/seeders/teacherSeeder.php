<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class teacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teacher')->insert([
            'teacherID'    => 'T123456789',
            'name' => '張玉盈',
            'email'        => 't123456789@gmail.com',
            'password'     => Hash::make('123'),  // 使用 Hash::make 來加密密碼
        ]);
        DB::table('teacher')->insert([
            'teacherID'    => 'T123456788',
            'name' => '林俊宏',
            'email'        => 't123456788@gmail.com',
            'password'     => Hash::make('123'),  // 使用 Hash::make 來加密密碼
        ]);
        DB::table('teacher')->insert([
            'teacherID'    => 'T123456787',
            'name' => '希家史提夫',
            'email'        => 't123456787@gmail.com',
            'password'     => Hash::make('123'),  // 使用 Hash::make 來加密密碼
        ]);
        DB::table('teacher')->insert([
            'teacherID'    => 'T123456786',
            'name' => '鄺獻榮',
            'email'        => 't123456786@gmail.com',
            'password'     => Hash::make('123'),  // 使用 Hash::make 來加密密碼
        ]);
        
    }
}
