<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Keluarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluarga', function (Blueprint $table) {
            $table->id();
            $table->integer('idwarga');
            $table->integer('idhunian')->nullable();
            $table->string('hunianstatus')->nullable();
            $table->integer('nomerkk')->unique();
            $table->string('name')->nullable();
            $table->string('idstatus')->nullable();
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
        Schema::dropIfExists('keluarga');

    }
}
