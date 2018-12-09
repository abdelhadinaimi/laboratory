<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterielsEquipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiels_equipes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipe_id')->unsigned()->nullable();
            $table->integer('materiel_id')->unsigned()->nullable();
            $table->dateTime('date');
            $table->timestamps();

            $table-> foreign('equipe_id')->references('id')->on('equipes')->onDelete('set null');
            $table-> foreign('materiel_id')->references('id')->on('materiels')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiels_equipes');
    }
}
