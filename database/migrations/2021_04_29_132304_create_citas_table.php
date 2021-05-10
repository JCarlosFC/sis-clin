<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_medico')->unsigned();
            $table->integer('id_especialidad')->unsigned();
            $table->date('fecha')->format('d/m/Y');
            $table->string('observacion');    
            $table->timestamps();
            
            $table->foreign('id_especialidad')->references('id')->on('especialidads');
            $table->foreign('id_medico')->references('id')->on('medicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
