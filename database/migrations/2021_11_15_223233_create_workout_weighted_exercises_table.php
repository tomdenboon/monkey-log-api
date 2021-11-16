<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutWeightedExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_weighted_exercises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('workout_exercise_group_id');
            $table->integer('reps')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('one_rm')->nullable();
            $table->integer('rpe')->nullable();
            $table->string('notes')->nullable();
            $table->integer('order');
            $table->boolean('is_lifted')->nullable();
            $table->timestamps();

            $table->foreign('workout_exercise_group_id')->references('id')->on('workout_exercise_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workout_weighted_exercises');
    }
}
