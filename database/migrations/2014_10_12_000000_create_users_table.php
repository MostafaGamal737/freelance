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
          $table->increments('id');
          $table->string('name');
          $table->string('email')->unique();
          $table->string('image')->nullable();
          $table->string('password');
          $table->integer('phone');
          $table->string('job_title')->nullable();
          //$table->integer('hourly_rate')->nullable();
          $table->double('rating')->default(0);
          $table->decimal('wallet', 8, 2)->default(0);
          $table->string('location');
          $table->string('fire_token')->default('token');
          $table->boolean('user_verified')->nullable();
          $table->string("role");
          $table->rememberToken();
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
