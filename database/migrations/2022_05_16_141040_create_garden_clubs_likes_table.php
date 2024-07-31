<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGardenClubsLikesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('garden_clubs_likes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->foreignId('article_id')->nullable();
			$table->foreignId('user_id')->nullable();
			$table->foreignId('service_id')->nullable();
			$table->foreignId('category_id')->nullable();
			$table->boolean('like_type')->nullable()->default(0);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('garden_clubs_likes');
	}

}
