<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Factions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('factions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->integer('parent')->unsigned()->nullable();

			$table->foreign('parent')->references('id')->on('factions');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('factions');
	}

}
