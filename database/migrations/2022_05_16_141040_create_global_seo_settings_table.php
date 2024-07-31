<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalSeoSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('global_seo_settings', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->foreignId('country_id')->nullable();
			$table->text('seo_title')->nullable();
			$table->text('seo_keywords')->nullable();
			$table->text('seo_robots')->nullable();
			$table->text('seo_description')->nullable();
			$table->text('facebook_description')->nullable();
			$table->text('facebook_image')->nullable();
			$table->text('twitter_title')->nullable();
			$table->text('twitter_description')->nullable();
			$table->text('twitter_image')->nullable();
			$table->text('revisit_after')->nullable();
			$table->text('canonical_url')->nullable();
			$table->text('yahoo_key')->nullable();
			$table->text('yandex_verification')->nullable();
			$table->text('microsoft_validate')->nullable();
			$table->text('facebook_page_id')->nullable();
			$table->text('author')->nullable();
			$table->text('pingback_url')->nullable();
			$table->text('alexa_code')->nullable();
			$table->text('facebook_advert_pixel_tag')->nullable();
			$table->text('google_site_verification')->nullable();
			$table->text('google_tag_manager_header')->nullable();
			$table->text('google_tag_manager_body')->nullable();
			$table->text('google_analytics')->nullable();
			$table->text('live_chat_tag')->nullable();
			$table->text('footer_script')->nullable();
			$table->text('facebook_site_name')->nullable();
			$table->text('facebook_admins')->nullable();
			$table->text('twitter_site')->nullable();
			$table->text('twitter_card')->nullable();
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
		Schema::drop('global_seo_settings');
	}

}
