<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_persona')->unsigned();
            $table->decimal('subtotal',5,2);
            $table->decimal('iva12',5,2);   
            $table->decimal('totalpagado',5,2);
            $table->date('fecha');
            $table->decimal('iva0');
            $table->string('num_factura12');
            $table->string('num_factura0');
            $table->foreign('id_persona')->references('id')->on('personas');
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
        Schema::dropIfExists('ventas');
    }
}
