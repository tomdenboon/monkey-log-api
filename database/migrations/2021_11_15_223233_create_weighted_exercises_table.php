<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightedExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weighted_exercises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exercise_group_id');
            $table->integer('reps')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('one_rm')->nullable();
            $table->integer('rpe')->nullable();
            $table->string('notes')->nullable();
            $table->integer('order');
            $table->boolean('is_lifted')->nullable();
            $table->timestamps();

            $table->foreign('exercise_group_id')->references('id')->on('exercise_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weighted_exercises');
    }
}
