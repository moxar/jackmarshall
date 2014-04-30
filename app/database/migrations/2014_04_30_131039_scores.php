<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Scores extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scores', function(Blueprint $table)
		{
			$table->integer('value')->nullable();
			
			$table->integer('contest_id')->unsigned();
			$table->foreign('contest_id')->references('id')->on('contests')->onDelete('cascade');
			
			$table->integer('player_id')->unsigned();
			$table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
			
			$table->integer('objective_id')->unsigned();
			$table->foreign('objective_id')->references('id')->on('objectives')->onDelete('cascade');
			
			$table->primary(array('contest_id', 'player_id', 'objective_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('scores');
	}

}
