<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exercise_template_id');
            $table->unsignedBigInteger('field_type_id');
            $table->integer('order');
            $table->timestamps();

            $table->foreign('exercise_template_id')->references('id')->on('exercise_templates')->onDelete('cascade');
            $table->foreign('field_type_id')->references('id')->on('field_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_templates');
    }
}
