<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTournamentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('players_tournaments', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('player');
			$table->integer('tournament');
			$table->integer('victory')->nullable();
			$table->integer('control')->nullable();
			$table->integer('destruction')->nullable();
			$table->integer('sos')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('players_tournaments');
	}

}
 
