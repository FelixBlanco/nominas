<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBancoEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banco_empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('empleados_id')->unsigned();
            $table->foreign('empleados_id')->references('id')->on('empleados');
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
        Schema::dropIfExists('banco_empleados');
    }
}
