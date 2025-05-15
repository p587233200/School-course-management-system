<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentTable extends Migration
{
    public function up(): void
    {
        Schema::create('assignment', function (Blueprint $table) {
            $table->bigIncrements('assignmentID');
            $table->unsignedBigInteger('courseID');
            $table->text('title');
            $table->text('content');
            $table->dateTime('deadline');

            $table->primary('assignmentID');
            $table->foreign('courseID')->references('courseID')->on('course');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assignment');
    }
}


