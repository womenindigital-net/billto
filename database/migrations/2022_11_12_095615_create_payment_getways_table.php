<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentGetwaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_getways', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('subscription_package_id')->nullable();
            $table->integer('organization_package_id')->nullable();
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
        Schema::dropIfExists('payment_getways');
    }
}
