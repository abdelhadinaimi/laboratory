<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre', 150)->nullable();
            $table->string('sujet',1000)->nullable();
            $table->string('mots_cle')->nullable();
            $table->string('date_debut',40)->nullable();
            $table->string('date_soutenance',40)->nullable();
            $table->string('encadreur_int',150)->nullable();
            $table->string('detail')->nullable();
            $table->string('encadreur_ext',150)->nullable();
            $table->string('coencadreur_int',150)->nullable();
            $table->string('coencadreur_ext',150)->nullable();
            $table->string('membre',150)->nullable();
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
        Schema::dropIfExists('theses');
    }
}
