<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Warga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->id();
            $table->integer('nik')->unique();
            $table->string('name')->nullable();
            $table->string('placeofbirth')->nullable();
            $table->timestamp('birthdate')->useCurrent()->nullable();
            $table->string('job')->nullable();
            $table->integer('iswarga_lingkungan')->nullable();
            $table->integer('isKepala_keluarga')->nullable();
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
        Schema::dropIfExists('warga');

    }
}
