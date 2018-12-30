<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stagiaire_id')->unsigned()->nullable();
            $table->integer('partenaire_id')->unsigned()->nullable();
            $table->integer('contact_id')->unsigned()->nullable();
            $table->string('dateDebut',12);
            $table->string('dateFin',12);
            $table-> foreign('stagiaire_id')->references('id')->on('users')->onDelete('cascade');
            $table-> foreign('partenaire_id')->references('id')->on('partenaires')->onDelete('cascade');
            $table-> foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
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
        Schema::dropIfExists('stages');
    }
}
