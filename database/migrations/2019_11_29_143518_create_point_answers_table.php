<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('point_id');
            $table->foreign('point_id')->references('id')->on('points')->onDelete('cascade');
            $table->unsignedInteger('answer_id');
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');
            $table->tinyInteger('selected');
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
        Schema::dropIfExists('point_answers');
    }
}
