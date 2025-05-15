<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student')->insert([
            'studentID'    => 'M133040021',
            'name'         => '許哲晟',
            'email'        => 'm133040021@gmail.com',
            'password'     => Hash::make('123'),  // 使用 Hash::make 來加密密碼
        ]);
        
        DB::table('student')->insert([
            'studentID'    => 'M133040006',
            'name'         => '丁襄龍',
            'email'        => 'm133040006@gmail.com',
            'password'     => Hash::make('123'),  
        ]);
        DB::table('student')->insert([
            'studentID'    => 'M133040001',
            'name'         => '路人1',
            'email'        => 'm133040001@gmail.com',
            'password'     => Hash::make('123'),  
        ]);
    }
}
