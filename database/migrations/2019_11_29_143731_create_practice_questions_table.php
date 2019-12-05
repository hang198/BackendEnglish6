<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticeQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('practice_id');
            $table->foreign('practice_id')->references('id')->on('practices');
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions');
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
        Schema::dropIfExists('practice_questions');
    }
}
