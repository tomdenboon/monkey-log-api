<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExerciseRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_rows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exercise_group_id');
            $table->boolean('is_lifted')->nullable();
            $table->integer('order');
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
        Schema::dropIfExists('exercise_rows');
    }
}
