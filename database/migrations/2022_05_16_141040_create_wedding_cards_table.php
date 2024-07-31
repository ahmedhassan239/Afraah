<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeddingCardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wedding_cards', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('name')->nullable();
			$table->string('slug')->nullable();
			$table->text('description')->nullable();
			$table->integer('price')->nullable();
			$table->text('phone')->nullable();
			$table->string('email')->nullable();
			$table->text('package')->nullable();
			$table->bigInteger('user_id')->unsigned()->nullable();
			$table->bigInteger('service_id')->unsigned()->nullable();
			$table->bigInteger('country_id')->unsigned()->nullable();
			$table->bigInteger('city_id')->unsigned()->nullable();
			$table->bigInteger('category_id')->unsigned()->nullable();
			$table->text('gallery')->nullable();
			$table->text('banner')->nullable();
			$table->text('alt')->nullable();
			$table->text('thumb')->nullable();
			$table->text('thumb_alt')->nullable();
			$table->text('location')->nullable();
			$table->text('location_url')->nullable();
			$table->text('seo_title')->nullable();
			$table->text('seo_keywords')->nullable();
			$table->text('seo_robots')->nullable();
			$table->text('seo_description')->nullable();
			$table->text('facebook_description')->nullable();
			$table->text('facebook_image')->nullable();
			$table->text('twitter_title')->nullable();
			$table->text('twitter_description')->nullable();
			$table->text('twitter_image')->nullable();
			$table->boolean('status')->default(0);
			$table->boolean('feature')->default(0);
			$table->boolean('has_offer')->nullable()->default(0);
			$table->bigInteger('offer_percentage')->nullable();
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
		Schema::drop('wedding_cards');
	}

}
