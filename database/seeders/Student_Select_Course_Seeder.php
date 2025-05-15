<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Student_Select_Course_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student_select_course')->insert([
            'studentID'    => 'M133040006',
            'courseID'         => '1',  
        ]);
        DB::table('student_select_course')->insert([
            'studentID'    => 'M133040006',
            'courseID'         => '2',  
        ]);
        DB::table('student_select_course')->insert([
            'studentID'    => 'M133040021',
            'courseID'         => '1',  
        ]);
        DB::table('student_select_course')->insert([
            'studentID'    => 'M133040021',
            'courseID'         => '2',  
        ]);
        DB::table('student_select_course')->insert([
            'studentID'    => 'M133040021',
            'courseID'         => '3',  
        ]);
        
    }
}
