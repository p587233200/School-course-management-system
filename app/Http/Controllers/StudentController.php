<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Assignment;
use App\Models\Student;
use App\Models\Course;


class StudentController extends Controller
{
    //首頁
    public function home(){   
        // 先檢查使用者是否登入。
        // 取得對應的學生資料。
        // 查詢該學生的課程和擔任 TA 的課程。
        // 將資料傳給前端頁面顯示。

        
        // $studentID = session('user_id'); // 轉成字串
        $studentID = (string) session('user_id');

        if (!$studentID) {
            abort(403, 'User not logged in');
        }
        $student = Student::find($studentID);
        if (!$student) {
            abort(404, 'Student not found');
        }
        

        $myCourses = $student->courses()
                     ->with(['teacher'])
                     ->get();

        $taCourses = Course::where('taID', $studentID)
                        ->with(['teacher','ta'])
                        ->get();


        return view('student.home', compact('myCourses','taCourses'));
    }

    //課程細節
    public function courseDetail($courseID){
        $course = DB::table('course')->where('courseID', $courseID)->first();

        $announcements = DB::table('announcement')->where('courseID', $courseID)->get();
        $assignments = DB::table('assignment')->where('courseID', $courseID)->get();

        return view('student.course_detail', compact('course', 'announcements', 'assignments'));
    }

    public function uploadAssignmentForm(Assignment $assignment){
        if (!$assignment) {
            abort(404, '作業不存在');
        }

        return view('student.upload', compact('assignment'));
    }

    public function submitAssignment(Request $request, Assignment $assignment){
        $request->validate([
            'report' => 'required|file|max:10240', // 限 10MB
        ]);

        $studentID = session('user_id');
        $filename = $studentID . '_assignment_' . $assignment->title . '.' . $request->file('report')->getClientOriginalExtension();
        $path = $request->file('report')->storeAs('assignments', $filename, 'public');

        // 刪除舊資料（僅保留最新一筆）
        DB::table('student_submit_assignment')->where([
            ['studentID', '=', $studentID],
            ['assignmentID', '=', $assignment->assignmentID],
        ])->delete();

        DB::table('student_submit_assignment')->insert([
            'studentID'     => $studentID,
            'assignmentID'  => $assignment->assignmentID,
            'score'         => 0,
            'feedback'      =>'',
            'submit_timestamp'  => DB::raw('CURRENT_TIMESTAMP'),
            'file_url'     => $path,
        ]);

        return redirect()->route('student.course.detail', $assignment->courseID)
            ->with('success', '作業上傳成功');
    }

    public function viewGrade($assignmentID){
        $studentID = session('user_id');
    
        // 獲取個人作業
        $assignment = Assignment::with(['submissions','submissions.student'])->find($assignmentID);
        
        // 獲取全班作業分數
        $allScores = DB::table('student_submit_assignment')
            ->where('assignmentID', $assignment->assignmentID)
            ->pluck('score')
            ->toArray();
    
        // 計算分數區間
        // $scoreDistribution = array_count_values($allScores);
        $scoreDistribution=[
            60 => 5,  
            65 => 3, 
            70 => 13, 
            80 => 18, 
            90 => 10, 
            100 => 4 
        ];
        
        return view('student.grade', compact('assignment', 'scoreDistribution'));
    }
    

}
