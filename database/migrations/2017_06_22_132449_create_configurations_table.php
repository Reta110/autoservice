<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('configurations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('iva');
            $table->string('price_hh');
            $table->string('comision_tdd')->default(0);
            $table->string('comision_tdc')->default(0);
            $table->text('text_email_order')->default(0);

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
        Schema::dropIfExists('configurations');
    }
}
