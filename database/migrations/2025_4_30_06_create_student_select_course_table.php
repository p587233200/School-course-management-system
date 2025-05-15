<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSelectCourseTable extends Migration
{
    public function up(): void
    {
        Schema::create('student_select_course', function (Blueprint $table) {
            $table->string('studentID', 10);
            $table->unsignedBigInteger('courseID');

            $table->primary(['studentID', 'courseID']);
            $table->foreign('studentID')->references('studentID')->on('student');
            $table->foreign('courseID')->references('courseID')->on('course');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_select_course');
    }
}



