<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTable extends Migration
{
    public function up(): void
    {
        Schema::create('teacher', function (Blueprint $table) {
            $table->string('teacherID', 10);
            $table->text('name');
            $table->text('email');
            $table->text('password');

            $table->primary('teacherID');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teacher');
    }
}



