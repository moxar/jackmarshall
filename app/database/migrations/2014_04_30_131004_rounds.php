<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rounds extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rounds', function(Blueprint $table)
		{
			$table->increments('id');
			$table->foreign('contest_id')->references('id')->on('contests')->onDelete('cascade');
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
		Schema::drop('rounds');
	}

}
