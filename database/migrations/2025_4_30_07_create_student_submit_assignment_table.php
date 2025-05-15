<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSubmitAssignmentTable extends Migration
{
    public function up(): void
    {
        Schema::create('student_submit_assignment', function (Blueprint $table) {
            $table->string('studentID', 10);
            $table->unsignedBigInteger('assignmentID');
            $table->integer('score');
            $table->text('feedback');
            $table->timestamp('submit_timestamp');
            $table->text('file_url');

            $table->primary(['studentID', 'assignmentID']);
            $table->foreign('studentID')->references('studentID')->on('student');
            $table->foreign('assignmentID')->references('assignmentID')->on('assignment');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_submit_assignment');
    }
}



