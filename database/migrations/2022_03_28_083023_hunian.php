<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hunian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hunian', function (Blueprint $table) {
            $table->id();
            $table->integer('idwarga')->nullable();
            $table->string('block_number')->nullable();
            $table->string('house_number')->nullable();
            $table->string('building_type')->nullable();
            $table->integer('surface_area')->nullable();
            $table->integer('building_area')->nullable();
            $table->integer('isactive');
            $table->integer('createdby')->nullable();
            $table->integer('updatedby')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hunian');
    }
}
