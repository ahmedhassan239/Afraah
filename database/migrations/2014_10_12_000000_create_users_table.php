<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->bigInteger('id', true)->unsigned();
            $table->string('name')->nullable();
            $table->string('arabic_name')->nullable();
            $table->boolean('is_admin')->default(0);
            $table->string('phone')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('service_id')->nullable();
            $table->text('gender')->nullable();
            $table->string('email')->unique();
            $table->text('photo')->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->string('password');
            $table->string('api_token', 80)->nullable()->unique();
            $table->string('remember_token', 100)->nullable();
            $table->text('verification_code')->nullable();
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
        Schema::dropIfExists('users');
    }
}
