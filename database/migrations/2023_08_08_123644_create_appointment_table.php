<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('windowid');
            $table->unsignedBigInteger('studentid')->nullable();
            $table->unsignedBigInteger('scheduleid');
            $table->unsignedBigInteger('timeid');
            $table->foreign('windowid')->references('id')->on('window');
            $table->foreign('studentid')->references('studentId')->on('student');
            $table->foreign('scheduleid')->references('id')->on('schedule');
            $table->foreign('timeid')->references('id')->on('time');
            $table->unsignedBigInteger('guestid')->nullable();
            $table->foreign('guestid')->references('id')->on('guest');
            $table->string("category");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment');
    }
};
