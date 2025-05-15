<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Submission;
use App\Models\Student;
use App\Models\StudentSubmitAssignment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\GradeNotification;
use App\Mail\AssignmentGradedMail;

use Spatie\SimpleExcel\SimpleExcelWriter;




use ZipArchive;

class TeacherAssignmentController extends Controller
{
    // 顯示新增作業表單
    public function create($courseID)
    {
        $course = Course::findOrFail($courseID);
        return view('teacher.assignment_create', compact('course'));
    }

    // 儲存新作業
    public function store(Request $request, $courseID)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'deadline' => 'required|date',
        ]);

        Assignment::create([
            'courseID' => $courseID,
            'title' => $request->title,
            'content' => $request->content,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('teacher.course.detail', $courseID)->with('success', '新增作業成功！');
    }

    // 編輯作業表單
    public function edit($assignmentID)
    {
        $assignment = Assignment::with('course')->findOrFail($assignmentID);
        return view('teacher.assignment_edit', compact('assignment'));
    }

    // 更新作業資料
    public function update(Request $request, $assignmentID)
    {
        $assignment = Assignment::findOrFail($assignmentID);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'deadline' => 'required|date',
        ]);

        $assignment->update($request->only('title', 'content', 'deadline'));

        return redirect()->route('teacher.course.detail', $assignment->courseID)->with('success', '作業修改成功！');
    }

    // 查看學生繳交情況
    public function submissions($assignmentID)
    {
    //     $assignment = Assignment::with('submissions')->findOrFail($assignmentID);
    //     return view('teacher.assignment_submissions', compact('assignment'));
        $assignment = Assignment::with(['submissions', 'course.students'])->findOrFail($assignmentID);
        // $submission = $assignment->submissions->firstWhere('studentID', $student->studentID);


        return view('teacher.assignment_submissions', compact('assignment'));
    }

    public function fixScoreSubmission(Request $request)
    {
        $request->validate([
            'score' => 'required|integer|min:0|max:100',
            'studentID' => 'required|string',
            'assignmentID' => 'required|integer',
            'feedback' => 'required|string',
        ]);

        DB::table('student_submit_assignment')
            ->where('studentID', $request->input('studentID'))
            ->where('assignmentID', $request->input('assignmentID'))
            ->update(['score' => $request->input('score'),
                      'feedback'=>$request->input('feedback')
                    ]);

        return redirect()->back()->with('success', '評分已更新');
    }
    public function sendEmail(Request $request)
    {
        $student = Student::findOrFail($request->studentID);
        $assignment = Assignment::findOrFail($request->assignmentID);
        $submission = $assignment->submissions()->where('studentID', $student->studentID)->first();

        if (!$submission || is_null($submission->score)) {
            return back()->with('error', '無法寄送，尚未評分。');
        }

        Mail::to($student->email)->send(new AssignmentGradedMail($assignment, $submission));
        
        return back()->with('success', 'Email 已寄送給 ' . $student->name);
    }
    public function viewGrade($assignmentID)
    {
        // $studentID = session('user_id');
    
        // // 獲取個人作業
        // $homework = DB::table('student_submit_assignment')
        //     ->where('studentID', $studentID)
        //     ->where('assignmentID', $assignment->assignmentID)
        //     ->first();

        // $myScore = $homework -> score;
        // $myfeedback = $homework -> feedback;
        $assignment = Assignment::with(['submissions'])->findOrFail($assignmentID);
        
        // dd($assignment);
        // 獲取全班作業分數
        // $allScores = DB::table('student_submit_assignment')
        //     ->where('assignmentID', $assignment->assignmentID)
        //     ->pluck('score')
        //     ->toArray();
        $allScores = $assignment->submissions->pluck('score')->filter()->toArray();
    
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
        
        return view('teacher.grade', compact('assignment', 'scoreDistribution'));
    }

    //全班成績輸出成 Excel
    public function downloadGrades($assignmentID)
    {
        $filePath = storage_path("app/public/assignment_{$assignmentID}_grades.csv");

        $assignment = Assignment::findOrFail($assignmentID);

        $submissions = $assignment->submissions()
            ->with('student')
            ->get();

        $writer = SimpleExcelWriter::create($filePath)
            ->addRow(['學號', '姓名', '分數', '評語', '繳交時間']); // 標題列

        foreach ($submissions as $submission) {
            $writer->addRow([
                $submission->student->studentID,
                $submission->student->name,
                $submission->score,
                $submission->feedback,
                $submission->submit_timestamp,
            ]);
        }

        $writer->close();

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    // public function downloadGrades($assignmentID)
    // {
    //     return Excel::download(new AssignmentGradesExport($assignmentID), 'assignment_grades.xlsx');
    // }
}
