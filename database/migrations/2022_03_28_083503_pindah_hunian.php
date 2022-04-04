<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PindahHunian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pindah_hunian', function (Blueprint $table) {
            $table->id();
            $table->integer('idwarga');
            $table->integer('idhunian');
            $table->integer('ispindah_dalam_lingkungan')->nullable();
            $table->string('newresidence')->nullable();
            $table->timestamp('movedate')->useCurrent()->nullable();
            $table->string('move_reason')->nullable();
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
        Schema::dropIfExists('pindah_hunian');
    }
}
