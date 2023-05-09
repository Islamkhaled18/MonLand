<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->double('price', 18, 4)->unsigned()->nullable();
            $table->boolean('manage_stock')->nullable();
            $table->integer('qty')->nullable();
            $table->boolean('in_stock')->nullable();
            $table->integer('viewed')->unsigned()->default(0);
            $table->boolean('is_active')->nullable();
            $table->longText('anotherInformation')->nullable();
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();
            $table->string('cover_image')->nullable();
            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
            $table->bigInteger('vendor_id')->unsigned()->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('set null');
            $table->bigInteger('mainCategory_id')->unsigned()->nullable();
            $table->foreign('mainCategory_id')->references('id')->on('main_categories')->onDelete('cascade');
            $table->boolean('featured')->default(0);
            $table->boolean('deal_of_the_day')->default(0);
            $table->boolean('flash_sale')->default(0);
            $table->boolean('quick_request')->default(0);
            $table->string('weight');
            $table->string('dimension');
            $table->string('material');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
