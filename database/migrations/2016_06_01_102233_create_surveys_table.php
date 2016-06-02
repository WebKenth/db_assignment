<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSurveysTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('surveys', function (Blueprint $table) {
				$table->increments('id');
				$table->string('title');
				$table->string('description');
				$table->string('welcome_message');
				$table->string('exit_message');
				$table->datetime('start_date');
				$table->datetime('end_date');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('surveys');
	}
}
