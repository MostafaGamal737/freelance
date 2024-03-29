<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSittingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sittings', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->biginteger('phone')->nullable();
            $table->biginteger('card_number')->nullable();
            $table->biginteger('iban')->nullable();
            $table->text('description')->nullable();
            $table->text('terms')->nullable();
            $table->double('tax')->default(2.5);
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
        Schema::dropIfExists('sittings');
    }
}
