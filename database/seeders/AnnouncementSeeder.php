<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Announcement;


class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('announcement')->insert([
            'courseID'   => '1',
            'title'      => '請寫homework_1',
            'content'    => '加油1',
            'timestamp'  => DB::raw('CURRENT_TIMESTAMP'),  // 使用 SQL 的 CURRENT_TIMESTAMP
        ]);
        DB::table('announcement')->insert([
            'courseID'   => '1',
            'title'      => '請寫homework_2',
            'content'    => '加油2',
            'timestamp'  => DB::raw('CURRENT_TIMESTAMP'),  // 使用 SQL 的 CURRENT_TIMESTAMP
        ]);
        Announcement::factory()->count(30)->create();
    }
}
