<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->timestamps();
			$table->string('name');
			$table->string('password');
			$table->string('email');
		});
		
		Schema::create('tournaments', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->timestamps();
			$table->string('name');
		});
		
		Schema::create('games', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->timestamps();
			$table->integer('tournament');
		});
		
		Schema::create('repports', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->timestamps();
			$table->integer('user')->unsigned();
			$table->integer('game')->unsigned();
			$table->boolean('victory');
			$table->tinyInteger('control')->unsigned();
			$table->tinyInteger('destruction')->unsigned();
		});		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
		Schema::drop('tournaments');
		Schema::drop('games');
		Schema::drop('repports');
	}

}
