<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('materiels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference',12)->unique();
            $table->integer('categorie_id')->unsigned();
            $table->string('description',45)->nullable();
            $table->foreign('categorie_id')
            ->references('id')->on('categories')
            ->onDelete('cascade');
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
        Schema::dropIfExists('materiels');
    }
}
