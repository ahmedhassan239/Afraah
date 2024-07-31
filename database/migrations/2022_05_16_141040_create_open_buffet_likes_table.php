<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenBuffetLikesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('open_buffet_likes', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
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
		Schema::drop('open_buffet_likes');
	}

}
