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
			$table->string('name');
			$table->string('slug');
			$table->enum('type', Config::get('jack.types'));
			$table->string('field_allowance');

			$table->integer('expansion_id')->unsigned()->nullable();
			$table->foreign('expansion_id')->references('id')->on('expansions');

			$table->integer('faction_id')->unsigned();
			$table->foreign('faction_id')->references('id')->on('factions');

			$table->integer('parent_id')->unsigned()->nullable();
			$table->foreign('parent_id')->references('id')->on('models');

			$table->unique('slug');
		});

		Schema::create('models_costs', function($table) {
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
		Schema::drop('models_costs');
		Schema::drop('models');
	}

}
