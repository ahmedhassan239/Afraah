<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdCounterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('id_counter', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('pc_ip', 45);
			$table->foreignId('service_id')->nullable();
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
		Schema::drop('id_counter');
	}

}
