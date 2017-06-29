<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title');
            $table->string('total_cost')->default(0)->nullable();
            $table->string('discount')->default(0)->nullable();
            $table->string('neto')->nullable();
            $table->string('iva')->nullable();
            $table->string('total')->nullable();
            $table->text('observations')->nullable();
            $table->text('hh');
            $table->enum('paid',['si','no']);
            $table->text('type_pay')->nullable();
            $table->text('pay_observations')->nullable();

            $table->enum('status', ['budget','started', 'template', 'ended']);


            $table->date('start_date')->nullable();
            $table->date('ended_date')->nullable();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('vehicle_id')->unsigned();
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');

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
