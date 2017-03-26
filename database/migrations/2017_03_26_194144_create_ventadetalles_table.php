<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentadetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventadetalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_venta')->unsigned();
            $table->integer('id_producto')->unsigned();
            $table->integer('cantidad');
            $table->decimal('pvp',5,2);
            $table->decimal('subtotal',5,2);
            $table->foreign('id_venta')->references('id')->on('ventas');
            $table->foreign('id_producto')->references('id')->on('productos');
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
        Schema::dropIfExists('ventadetalles');
    }
}
