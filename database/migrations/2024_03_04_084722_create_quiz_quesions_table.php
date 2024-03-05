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
        Schema::create('quiz_quesions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quizz_id'); 
            $table->foreign('quizz_id')->references('id')->on('quizzes');
            $table->string('description');
            $table->string('chioce_1');
            $table->string('chioce_2');
            $table->string('chioce_3');
            $table->string('chioce_4');
            $table->set('quesion_correct', ['1', '2', '3', '4']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_quesions');
    }
};
