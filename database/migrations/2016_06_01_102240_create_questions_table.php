<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('questions', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('description');
			$table->boolean('required');
			$table->integer('survey_id')->unsigned();
			$table->integer('question_type_id')->unsigned();
			$table->timestamps();
			
			$table->foreign('survey_id')
					->references('id')
					->on('surveys')
					->onDelete('cascade');

			$table->foreign('question_type_id')
					->references('id')
					->on('question_types')
					->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('questions');
	}
}
