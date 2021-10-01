<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_producto')->unsigned();
            $table->date('fecha');
            $table->string('tipo_comprobante');
            $table->string('serie');
            $table->string('numero');
            $table->string('tipo_operacion');
            $table->integer('cantidad');
            $table->float('costo_unitario');
            $table->float('costo_total');
            $table->foreign('id_producto')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salidas');
    }
}
