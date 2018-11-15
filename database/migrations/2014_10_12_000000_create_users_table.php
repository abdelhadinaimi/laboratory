<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('prenom',45)->nullable();
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
            $table->string('date_naissance',45)->nullable();
            $table->string('grade',20)->nullable();
            $table->string('password')->nullable();
            $table->string('num_tel')->nullable();
            // $table->boolean('autorisation_public_linkedin')->nullable()->default(false);
            $table->boolean('autorisation_public_num_tel')->nullable()->default(false);
            $table->boolean('autorisation_public_photo')->nullable()->default(false);
            $table->boolean('autorisation_public_date_naiss')->nullable()->default(false);
            // $table->boolean('autorisation_public_rg')->nullable()->default(false);
            $table->string('lien_rg')->nullable();
            $table->string('lien_linkedin')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
