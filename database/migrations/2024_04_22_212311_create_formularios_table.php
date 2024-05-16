<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            $table->double('Inversion');
            $table->String('Direccion_Hospedaje');
            $table->String('Direccion_Residencia');
            $table->Date('Fecha_Creacion');

            /**
             * Llamando las entidades necesarias
             */
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('financiera_id');
            $table->unsignedBigInteger('movilidad_id');
            $table->unsignedBigInteger('evento_id');
            $table->unsignedBigInteger('actividad_id');
            $table->unsignedBigInteger('trayectoria_id');
            $table->unsignedBigInteger('institucion_id');
            /**
             * Llaves foraneas para las entidades anteriores
             */
            $table->foreign('user_id')
                ->references('id')
                ->on('users');      //foranea para user

            $table->foreign('financiera_id')
                ->references('id')
                ->on('financieras');    //foranea para financiera

            $table->foreign('movilidad_id')
                ->references('id')
                ->on('movilidads'); //foranea para movilidad

            $table->foreign('evento_id')
                ->references('id')
                ->on('eventos'); //foranea para eventos

            $table->foreign('actividad_id')
                ->references('id')
                ->on('actividads'); //foranea para actividades

            $table->foreign('trayectoria_id')
                ->references('id')
                ->on('trayectorias');   //foranea para trayectorias

            $table->foreign('institucion_id')
                ->references('id')
                ->on('institucions');   //foranea para instituciones

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formularios');
    }
};
