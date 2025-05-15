<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Student_Submit_Assignment_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student_submit_assignment')->insert([
            'studentID' => 'M133040021',
            'assignmentID' => '1',
            'score' => '100',
            'feedback' => 'homework_1寫得太棒了1',
            'submit_timestamp' => now(),
            'file_url' => 'assignments/M133040021_assignment_homework_1.docx', // 自訂時間
        ]);
        DB::table('student_submit_assignment')->insert([
            'studentID' => 'M133040021',
            'assignmentID' => '2',
            'score' => '99',
            'feedback' => 'homework_2寫得太棒了1',
            'submit_timestamp' => now(),
            'file_url' => 'assignments/M133040021_assignment_homework_2.docx', // 自訂時間
        ]);
        DB::table('student_submit_assignment')->insert([
            'studentID' => 'M133040006',
            'assignmentID' => '2',
            'score' => '66',
            'feedback' => 'so so !',
            'submit_timestamp' => now(),
            'file_url' => 'assignments/M133040006_assignment_homework_2.docx', // 自訂時間
        ]);

        
    }
}
