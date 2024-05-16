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
        Schema::create('role_user', function (Blueprint $table) {
            // $table->id();
            /**
             * call the tables
             */
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('user_id');
            /**
             * add foreign key for tables
             */
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')  //foreign for roles
                ->onDelete('cascade');  //if the role is delete, delete in this table

            $table->foreign('user_id')
                ->references('id')
                ->on('users')  //foreign for users
                ->onDelete('cascade');  //if the user is delete, delete in this table

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_user');
    }
};
