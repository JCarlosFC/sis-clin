<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_citas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cita')->unsigned();
            $table->integer('id_persona')->unsigned();
            $table->time('hora');
            $table->string('descripcion');  
            $table->timestamps();

            $table->foreign('id_cita')->references('id')->on('citas');
            $table->foreign('id_persona')->references('id_persona')->on('persona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_citas');
    }
}
