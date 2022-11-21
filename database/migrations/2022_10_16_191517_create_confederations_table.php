<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfederationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confederations', function (Blueprint $table) {
            $table->id();
            $table->string('confederation_name');
            $table->unsignedBigInteger('continent_id');
            $table->unsignedBigInteger('second_continent')->nullable();
            $table->string('confederation_logo')->nullable();
            $table->foreign('continent_id')->references('id')->on('continents');
            $table->foreign('second_continent')->references('id')->on('continents');
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
        Schema::dropIfExists('confederations');
    }
}
