<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blogs', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('name');
			$table->string('slug');
			$table->text('overview')->nullable();
			$table->text('description')->nullable();
			$table->foreignId('country_id')->index('blogs_destination_id_foreign');
			$table->string('banner')->nullable();
			$table->string('thumb_alt')->nullable();
			$table->string('alt')->nullable();
			$table->string('thumb')->nullable();
			$table->text('gallery')->nullable();
			$table->string('seo_title')->nullable();
			$table->text('seo_keywords')->nullable();
			$table->string('seo_robots')->nullable();
			$table->text('seo_description')->nullable();
			$table->text('facebook_description')->nullable();
			$table->text('facebook_image')->nullable();
			$table->text('twitter_title')->nullable();
			$table->text('twitter_description')->nullable();
			$table->text('twitter_image')->nullable();
			$table->boolean('status')->default(1);
			$table->boolean('feature')->default(1);
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
		Schema::drop('blogs');
	}

}
