<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->biginteger('client_phone');
            $table->string('provider_name')->nullable();
            $table->biginteger('provider_phone')->nullable();
            $table->biginteger('transaction_id');
            $table->double('price');
            $table->double('total_price');
            $table->integer('duration');
            $table->double('tax');
            $table->boolean('status');
            $table->double('app_money');
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
        Schema::dropIfExists('invoices');
    }
}
