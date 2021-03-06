<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResponsesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('responses', function (Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('survey_id')->unsigned();

			$table->foreign('user_id')
				->references('user_id')
				->on('survey_participants')
				->onDelete('cascade');

			$table->foreign('survey_id')
				->references('survey_id')
				->on('survey_participants')
				->onDelete('cascade');

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
		Schema::drop('responses');
	}
}
