<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChampionshipsHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('championships_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('continental_tournament_id')->nullable();
            $table->unsignedBigInteger('national_tournament_id')->nullable();
            $table->unsignedBigInteger('champion_id');
            $table->unsignedBigInteger('oponent_id');
            $table->string('year');
            $table->foreign('national_tournament_id')->references('id')->on('leagues');
            $table->foreign('continental_tournament_id')->references('id')->on('continental_tournaments');
            $table->foreign('champion_id')->references('id')->on('teams');
            $table->foreign('oponent_id')->references('id')->on('teams');
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
        Schema::dropIfExists('championships_histories');
    }
}
