<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Objectives extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('objectives', function(Blueprint $table)
		{
			$table->increments('id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('name');
			$table->string('slug');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('objectives');
	}

}
