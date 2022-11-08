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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string('invoice_logo', 1024)->nullable();
            $table->string('invoice_form', 1024)->nullable();
            $table->string('invoice_to', 1024)->nullable();
            $table->string('invoice_id', 30)->nullable();
            $table->date('invoice_date')->nullable();
            $table->string('invoice_payment_term', 30)->nullable();
            $table->date('invoice_dou_date')->nullable();
            $table->string('invoice_po_number', 30)->nullable();
            $table->string('invoice_notes', 1024)->nullable();
            $table->string('invoice_terms', 1024)->nullable();
            $table->string('invoice_tax_percent')->nullable();
            $table->string('requesting_advance_amount_percent')->nullable();
            $table->string('receive_advance_amount')->nullable();
            $table->string('total')->nullable();
            $table->string('currency', 30)->nullable();
            $table->enum('invoice_status', ['complete','incomlete'])->default('incomlete');
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
