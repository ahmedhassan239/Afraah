<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->foreignId('country_id')->nullable();
			$table->string('name');
			$table->string('slug');
			$table->text('description')->nullable();
			$table->text('banner_alt')->nullable();
			$table->text('banner')->nullable();
			$table->text('thumb_alt')->nullable();
			$table->text('thumb')->nullable();
			$table->boolean('status')->nullable()->default(1);
			$table->text('seo_title')->nullable();
			$table->text('seo_keywords')->nullable();
			$table->text('seo_robots')->nullable();
			$table->text('seo_description')->nullable();
			$table->text('facebook_description')->nullable();
			$table->text('twitter_title')->nullable();
			$table->text('twitter_description')->nullable();
			$table->text('twitter_image')->nullable();
			$table->text('facebook_image')->nullable();
			$table->bigInteger('sort_order');
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
		Schema::drop('categories');
	}

}
