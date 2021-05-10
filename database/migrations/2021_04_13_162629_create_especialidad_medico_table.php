<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadMedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidad_medico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_especialidad')->unsigned();
            $table->integer('id_medico')->unsigned();
            $table->timestamps();

            /*$table->foreign('id_especialidad')->references('id')->on('especialidads');
            $table->foreign('id_medico')->references('id')->on('medicos');*/
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
        Schema::dropIfExists('especialidad_medico');
    }
}
