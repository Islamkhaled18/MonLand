<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->string('phone');
            $table->boolean('whatsApp')->nullable();
            $table->string('order_number');
            $table->date('order_date');
            $table->integer('package_number');
            $table->bigInteger('vendor_id')->unsigned()->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('set null');
            $table->string('product_name');
            $table->string('product_type');
            $table->string('product_link');
            $table->string('prouct_quantity');
            $table->string('bill_of_lading')->nullable();
            $table->string('product_video')->nullable();
            $table->boolean('order_type')->nullable();
            $table->string('reason');
            $table->string('details');
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
        Schema::dropIfExists('exchanges');
    }
}
