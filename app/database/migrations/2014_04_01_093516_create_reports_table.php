<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reports', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->timestamps();
			$table->integer('game')->unsigned();
			$table->integer('player')->unsigned();
			$table->boolean('victory')->nullable();
			$table->tinyInteger('control')->unsigned()->nullable();
			$table->tinyInteger('destruction')->unsigned()->nullable();
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
 
