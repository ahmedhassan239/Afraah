<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneCounterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phone_counter', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('pc_ip', 45);
			$table->bigInteger('service_id')->unsigned();
			$table->string('cookies');
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
		Schema::drop('phone_counter');
	}

}
