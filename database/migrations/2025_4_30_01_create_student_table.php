<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    public function up(): void
    {
        Schema::create('student', function (Blueprint $table) {
            $table->string('studentID', 10);
            $table->text('name');
            $table->text('email');
            $table->text('password');

            $table->primary('studentID');
            $table->unique('studentID');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student');
    }
}


