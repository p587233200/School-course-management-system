<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTable extends Migration
{
    public function up(): void
    {
        Schema::create('course', function (Blueprint $table) {
            $table->bigIncrements('courseID');
            $table->string('teacherID', 10);
            $table->text('name');
            $table->string('taID', 10);


            $table->foreign('teacherID')->references('teacherID')->on('teacher');
            $table->foreign('taID')->references('studentID')->on('student');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course');
    }
}


