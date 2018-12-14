<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterielsMembresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiels_membres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('materiel_id')->unsigned()->nullable();
            $table->string('dateAffectation',20)->nullable();
            $table->string('dateRetour',20)->nullable();
            $table->timestamps();

            $table-> foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table-> foreign('materiel_id')->references('id')->on('materiels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiels_membres');
    }
}
