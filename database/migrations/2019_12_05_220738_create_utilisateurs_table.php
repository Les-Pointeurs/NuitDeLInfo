<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUtilisateursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('utilisateurs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('email');
			$table->text('mdp');
			$table->timestamp('date_creation')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('date_modification')->default('0000-00-00 00:00:00');
			$table->dateTime('date_verification')->nullable();
			$table->text('nom');
			$table->boolean('privileges');
			$table->text('remember_token')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('utilisateurs');
	}

}
