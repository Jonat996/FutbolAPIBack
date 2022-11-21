<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContinentalTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('continental_tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('tournament_name');
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('confederation_id');
            $table->string('tournament_logo')->nullable();
            $table->string('cup')->nullable();
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->foreign('confederation_id')->references('id')->on('confederations');
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
        Schema::dropIfExists('continental_tournaments');
    }
}
