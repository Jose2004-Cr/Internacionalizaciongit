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
        Schema::create('images', function (Blueprint $table) {

            $table->String('url');

            /**
             * this is an polymorphic table
             */

            $table->unsignedBigInteger('imageable_id'); //call the foreign key table
            $table->String('imageable_type');   //add the model type for the image

            $table->primary(['imageable_id', 'imageable_type']);  //add primary keys

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
