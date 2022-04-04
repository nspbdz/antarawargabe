<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KepemilikanHunian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepemilikan_hunian', function (Blueprint $table) {
            $table->id();
            $table->integer('idhunian');
            $table->integer('idwarga');
            $table->timestamp('ownershipdate')->useCurrent()->nullable();
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
        Schema::dropIfExists('kepemilikan_hunian');
    }
}
