<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('assignment')->insert([
            'courseID' => '1',
            'title' => 'homework_1',
            'content' => '我是作業內容1',
            'deadline' => '2025-4-30 23:59:59', // 自訂時間
        ]);
        DB::table('assignment')->insert([
            'courseID' => '1',
            'title' => 'homework_2',
            'content' => '我是作業內容2',
            'deadline' => '2025-12-31 23:59:59', // 自訂時間
        ]);
    }
}
