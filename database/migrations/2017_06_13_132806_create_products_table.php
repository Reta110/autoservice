<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('cost')->default(0)->nullable();
            $table->string('price')->default(0)->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('stock')->nullable();
            $table->integer('stock_minimum')->default(0)->nullable();
            $table->string('tags')->nullable();

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');

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
