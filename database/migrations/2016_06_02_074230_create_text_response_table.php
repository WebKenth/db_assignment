<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_response', function (Blueprint $table) {
            $table->integer('response_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->string('response');
            $table->timestamps();
            
            $table->foreign('response_id')
                  ->references('id')
                  ->on('responses')
                  ->onDelete('cascade');

            $table->foreign('question_id')
                  ->references('id')
                  ->on('questions')
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
        Schema::drop('text_response');
    }
}
