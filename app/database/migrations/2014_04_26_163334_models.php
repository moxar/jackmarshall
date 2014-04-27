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
			$table->string('field_allowance');
			$table->enum('expansion', Config::get('jack.expansions'));

			$table->integer('faction_id')->unsigned();
			$table->foreign('faction_id')->references('id')->on('factions');

			$table->integer('parent_id')->unsigned()->nullable();
			$table->foreign('parent_id')->references('id')->on('models');
		});

		Schema::create('models_sizes', function($table) {
			$table->integer('model_id')->unsigned();
			$table->foreign('model_id')->references('id')->on('models');
			$table->integer('quantity');
			$table->integer('cost');

			$table->primary(array('model_id', 'quantity'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('models_sizes');
		Schema::drop('models');
	}

}
