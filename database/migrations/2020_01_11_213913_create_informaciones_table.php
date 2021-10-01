<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_producto')->unsigned();
            $table->string('periodo');
            $table->string('ruc');
            $table->string('apellidos_nombres_dr');
            $table->string('establecimiento');
            $table->string('codigo_existencia');
            $table->string('tipo_existencia');
            $table->string('descripcion');
            $table->string('unidad_medida');
            $table->string('metodo_valuacion');
            
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
        Schema::dropIfExists('informaciones');
    }
}
