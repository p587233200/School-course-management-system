<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserIsLoggedIn;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherAssignmentController;
use App\Http\Controllers\TeacherAnnouncementController;
use App\Models\Assignment;

//home_page
Route::get('/', [HomeController::class, 'home']);

//logout
Route::post('auth/logout',[AuthController::class, 'logout'])->name('logout');

//login
Route::get('auth/login', [AuthController::class, 'showLoginForm'])->name('login_form');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
Route::get('/auth/register', [AuthController::class, 'showRegisterForm'])->name('register_form');
Route::post('/auth/register', [AuthController::class, 'register'])->name('register');



Route::middleware([EnsureUserIsLoggedIn::class])->group(function () {
    //student_page
    Route::get('/student/home', [StudentController::class, 'home'])->name('student.home');
    Route::get('/student/course/{courseID}', [StudentController::class, 'courseDetail'])->name('student.course.detail');

    //student_assignment
    Route::get('/student/assignment/{assignment}/upload', [StudentController::class, 'uploadAssignmentForm'])->name('student.assignment.upload');
    Route::post('/student/assignment/{assignment}/upload', [StudentController::class, 'submitAssignment'])->name('student.assignment.submit');
    Route::get('student/assignment/{assignment}/grade', [StudentController::class, 'viewGrade'])->name('student.assignment.grade');

    //teacher_page
    Route::get('/teacher/home', [TeacherController::class, 'home'])->name('teacher.home');
    Route::get('teacher/course/{course}/detail', [TeacherController::class, 'courseDetail'])->name('teacher.course.detail');

    //teacher_announcement
    Route::post('teacher/course/{course}/announcement', [TeacherAnnouncementController::class, 'storeAnnouncement'])->name('teacher.announcement.store');
    Route::get('/teacher/course/{courseID}/announcement/create', [TeacherAnnouncementController::class, 'createAnnouncement'])->name('teacher.announcement.create');
    Route::get('/teacher/announcement/{id}/edit', [TeacherAnnouncementController::class, 'editAnnouncement'])->name('teacher.announcement.edit');
    Route::put('/teacher/announcement/{announcementID}/update', [TeacherAnnouncementController::class, 'updateAnnouncement'])->name('teacher.announcement.update');

    //teacher_assignment
    Route::get('teacher/assignment/create/{courseID}', [TeacherAssignmentController::class, 'create'])->name('teacher.assignment.create');
    Route::post('teacher/assignment/store/{courseID}', [TeacherAssignmentController::class, 'store'])->name('teacher.assignment.store');
    Route::get('teacher/assignment/{assignmentID}/edit', [TeacherAssignmentController::class, 'edit'])->name('teacher.assignment.edit');
    Route::put('teacher/assignment/{assignmentID}/update', [TeacherAssignmentController::class, 'update'])->name('teacher.assignment.update');
    Route::get('teacher/assignment/{assignmentID}/submissions', [TeacherAssignmentController::class, 'submissions'])->name('teacher.assignment.submissions');
    Route::post('teacher/assignment/fixscore', [TeacherAssignmentController::class, 'fixScoreSubmission'])->name('teacher.assignment.score');
    Route::post('teacher/assignment/email', [TeacherAssignmentController::class, 'sendEmail'])->name('teacher.assignment.email');
    Route::get('teacher/assignment/{assignmentID}/grade', [TeacherAssignmentController::class, 'viewGrade'])->name('teacher.assignment.grade');
    Route::get('/teacher/assignment/{assignmentID}/download-grades', [TeacherAssignmentController::class, 'downloadGrades'])->name('teacher.assignment.downloadGrades');
    Route::get('teacher.assignment/{assignmentID}/download', [TeacherAssignmentController::class, 'downloadAll'])->name('teacher.assignment.downloadAll');

});
