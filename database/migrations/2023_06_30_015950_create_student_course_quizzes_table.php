<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_course_quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_quiz_id')->constrained('course_quizzes');
            $table->foreignId('student_id')->constrained('students');
            $table->integer('total_grade_pts');
            $table->integer('student_pts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_course_quiz');
    }
};
