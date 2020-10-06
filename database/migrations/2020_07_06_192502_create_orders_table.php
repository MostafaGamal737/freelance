<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("job_name");
            $table->text("description");
            $table->string("cancel")->default('null');
            $table->integer('user_id');
            $table->integer('provider_id')->nullable();
            $table->integer("invoice_id");
            $table->integer("payout_id");
            $table->integer("review_id")->nullable();
            $table->integer("chat_id")->nullable();
            $table->integer("status");
            $table->enum('approved_status', ['مفعله', 'قيد الانتظار']);
            $table->integer("customers_money_status");
            $table->integer("code");
            $table->DATETIME ("start_time")->nullable();
            $table->DATETIME ("end_time")->nullable();
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
        Schema::dropIfExists('orders');
    }
}
