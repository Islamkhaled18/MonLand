<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('Phone_2')->nullable();
            $table->integer('postal_code')->nullable();
            $table->string('address_details')->nullable();
            $table->bigInteger('governorate_id')->unsigned()->nullable();
            $table->foreign('governorate_id')->references('id')->on('governorates')->onDelete('cascade');
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('governorates')->onDelete('cascade');
            $table->integer('building_no')->nullable();
            $table->integer('flat_no')->nullable();
            $table->integer('apartment_no')->nullable();
            $table->string('special_mark')->nullable();
            $table->boolean('is_default')->default(0);
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
        Schema::dropIfExists('addresses');
    }
}
