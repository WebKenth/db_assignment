<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultipleChoiceResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_choice_response', function (Blueprint $table) {
            $table->integer('response_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->integer('choice_id')->unsigned();
            $table->timestamps();

            $table->foreign('response_id')
                  ->references('id')
                  ->on('responses')
                  ->onDelete('cascade');

            $table->foreign('question_id')
                  ->references('id')
                  ->on('questions')
                  ->onDelete('cascade');

            $table->foreign('choice_id')
                  ->references('id')
                  ->on('choices')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('multiple_choice_response');
    }
}
