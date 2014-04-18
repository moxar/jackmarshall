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
			$table->integer('victory')->default(0);
			$table->integer('control')->default(0);
			$table->integer('destruction')->default(0);
			$table->integer('sos')->default(0);
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
 
