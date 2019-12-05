<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('practice_id');
            $table->foreign('practice_id')->references('id')->on('practices');
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->unsignedBigInteger('theory_id');
            $table->foreign('theory_id')->references('id')->on('theories');
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
        Schema::dropIfExists('lessons');
    }
}
