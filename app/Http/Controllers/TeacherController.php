<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class TeacherController extends Controller
{
    public function home(){
        $teacherID = session('user_id');

        // 使用 Course 模型進行查詢
        $courses = Course::with('teacher')
            ->where('teacherID', $teacherID)
            ->get();

        return view('teacher.home', compact('courses'));
    }

    public function courseDetail($courseID){
        // 使用 Course 模型並載入作業與提交資料
        $course = Course::with(['assignments','announcements'])->findOrFail($courseID);

        return view('teacher.course_detail', compact('course'));

    }
}

