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
        Schema::create('nacionalidads', function (Blueprint $table) {
            $table->id();
            $table->String('Nombre')->noNull();
            $table->integer('Codigo_Pais')->unique()->noNull();
            //Relaiconando con la tabla Users
            $table->unsignedBigInteger('user_id')->unique(); // llamando la tabla users
            $table->foreign('user_id')
                ->references('id')
                ->on('users')           //llave foranea
                ->onUpdate('cascade ')  //si se actualiza en la tabla users, se actualiza en la tabla perfil
                ->onDelete('cascade');  //si se elimina de la tabla users, se elimina de la tabla perfil
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nacionalidads');
    }
};
