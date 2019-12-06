<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentairesVotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('commentaires_votes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('commentaire_id')->default(0);
			$table->integer('utilisateur_id')->default(0);
			$table->boolean('signalement')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('commentaires_votes');
	}

}
