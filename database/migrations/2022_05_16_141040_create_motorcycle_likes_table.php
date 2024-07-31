<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorcycleLikesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('motorcycle_likes', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->foreignId('article_id')->nullable();
			$table->string('user_id')->nullable();
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
		Schema::drop('motorcycle_likes');
	}

}
