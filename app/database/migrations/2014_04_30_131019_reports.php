<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reports extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reports', function(Blueprint $table)
		{
			$table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
			$table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
			$table->foreign('objective_id')->references('id')->on('objectives')->onDelete('cascade');
			$table->integer('value')->nullable();
			$table->string('comments')->nullable();
			$table->primary(array('game_id', 'player_id', 'objective_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reports');
	}

}
