<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carga_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nro_sacos');
            $table->string('day');
            $table->string('estado_pago');
            $table->integer('empleados_id')->unsigned();
            $table->foreign('empleados_id')->references('id')->on('empleados');
            $table->integer('tipo_productos_id')->unsigned();
            $table->foreign('tipo_productos_id')->references('id')->on('tipo_productos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carga_productos');
    }
}
