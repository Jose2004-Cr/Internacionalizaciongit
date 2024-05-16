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
        Schema::create('permiso_role', function (Blueprint $table) {
            // $table->id();
            /**
             * call the tables
             */
            $table->unsignedBigInteger('permiso_id');
            $table->unsignedBigInteger('role_id');
            /**
             * add foreign keys for tables
             */
            $table->foreign('permiso_id')
                ->references('id')
                ->on('permisos')    //foreign for permisos
                ->onDelete('cascade');  //if permiso is delete, delete in this table

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')   //foreign for roles
                ->onDelete('cascade');  //if role is delete, delete in this table

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permiso_role');
    }
};
