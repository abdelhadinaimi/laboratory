<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom',255);
            $table->string('prenom',255);
            $table->string('fonction',255)->nullable();
            $table->string('nature',255);
            $table->string('email',255)->nullable();
            $table->string('num_tel',15)->nullable();
            $table->string('description',255)->nullable();
            $table->integer('partenaire_id')->unsigned()->nullable();
            $table->timestamps();

            $table-> foreign('partenaire_id')->references('id')->on('partenaires')->onDelete('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
