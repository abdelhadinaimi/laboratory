<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type',20)->nullable();
            $table->string('titre',100)->nullable();
            $table->string('resume',400)->nullable();
            $table->string('lieu_ville',45)->nullable();
            $table->string('lieu_pays',45)->nullable();
            $table->string('conference',45)->nullable();
            $table->string('journal',45)->nullable();
            $table->integer('ISSN')->nullable();
            $table->integer('ISBN')->nullable();
            $table->string('mois',10)->nullable();
            $table->integer('annee')->nullable();
            $table->string('doi' ,100)->nullable();
            $table->string('membres_ext' ,100)->nullable();
            $table->string('detail')->nullable();
            $table->integer('deposer')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
