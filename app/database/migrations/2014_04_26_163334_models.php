<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Models extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('models', function($table) {
			$table->increments('id');
			$table->enum('type', Config::get('jack.types'));
			$table->string('name');
			$table->string('slug');
			$table->string('points');
			$table->string('field_allowance');
			$table->enum('expansion', Config::get('jack.expansions'));

			$table->integer('faction_id')->unsigned();
			$table->foreign('faction_id')->references('id')->on('factions');

			$table->integer('parent_id')->unsigned()->nullable();
			$table->foreign('parent_id')->references('id')->on('models');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('models');
	}

}
