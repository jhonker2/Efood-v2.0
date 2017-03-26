<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidodetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidodetalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_producto')->unsigned();
            $table->integer('id_pedido')->unsigned();
            $table->integer('cantidad');
            $table->decimal('subtotal',5,2);
            $table->decimal('pvp',5,2);
            $table->string('detalle');
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->foreign('id_pedido')->references('id')->on('pedidos');
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
        Schema::dropIfExists('pedidodetalles');
    }
}
