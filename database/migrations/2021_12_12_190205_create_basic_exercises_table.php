<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_exercises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exercise_row_id');
            $table->integer('reps')->default(0);
            $table->timestamps();

            $table->foreign('exercise_row_id')->references('id')->on('exercise_rows')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basic_exercises');
    }
}
