<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('announcement', function (Blueprint $table) {
            $table->bigIncrements('announcementID');
            $table->unsignedBigInteger('courseID');
            $table->text('title');
            $table->text('content');
            $table->timestamp('timestamp')->useCurrent()->useCurrentOnUpdate();

            $table->primary('announcementID');
            $table->foreign('courseID')->references('courseID')->on('course');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('announcement');
    }
};

