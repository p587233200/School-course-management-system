<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Assignment;
use App\Models\Announcement;
use App\Models\StudentSubmitAssignment;
use Illuminate\Support\Facades\Mail;
use App\Mail\AnnouncementNotification;

class TeacherAnnouncementController extends Controller
{
    public function createAnnouncement($courseID)
    {
        $course = Course::findOrFail($courseID);
        return view('teacher.announcement_create', compact('course'));
    }

    // 儲存公告並寄送 email
    public function storeAnnouncement(Request $request, $courseID)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        // 使用 Announcement 模型儲存公告
        $announcement = Announcement::create([
            'courseID' => $courseID,
            'title' => $request->title,
            'content' => $request->content,
            'timestamp' => now(),
        ]);

        //取得所有學生並發送通知
        $students = $announcement->course->students; // 使用關聯取得所有學生
        $course = Course::with(['assignments','announcements'])->findOrFail($courseID);


        foreach ($students as $student) {
            Mail::to($student->email)->queue(new AnnouncementNotification($course, $announcement));
        }


        return view('teacher.course_detail', compact('course'))->with('success', '公告發布並寄送成功！');
    }

    public function editAnnouncement($announcementID)
    {
        $announcement = Announcement::with('course')->findOrFail($announcementID);
        return view('teacher.announcement_edit', compact('announcement'));
    }

    public function updateAnnouncement(Request $request, $announcementID)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $announcement = Announcement::findOrFail($announcementID);
        $announcement->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('teacher.course.detail', $announcement->courseID)->with('success', '修改公告成功！');
    }

}

