<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unique()->unsigned();;
            $table->integer('id_colegio_estudio')->unsigned();;
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('nombres');
            $table->string('numero_colegio_estudio');
            $table->string('rne');
            $table->string('honorarios');
            $table->integer('ruc');
            $table->string('cuenta_corriente_ctr');
            $table->string('sexo');
            $table->string('telefono_domicilio');
            $table->string('celular');
            $table->string('direccion_domicilio');
            $table->string('distrito');
            $table->string('referencia_domicilio');
            $table->string('email');
            $table->string('lugar_nacimiento');
            $table->date('fecha_nacimiento')->format('d/m/Y');
            $table->string('estado_civil');
            $table->string('codigo_medico');
            $table->string('tipo_documento');
            $table->string('numero_documento');
            $table->string('observacion');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_colegio_estudio')->references('id')->on('colegio_estudios');

            /*$table->foreignId('id_user')->constrained('users');
            $table->foreignId('id_colegio_estudio')->constrained('colegio_estudios');*/

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicos');
    }
}
