<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToParametres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
    Schema::table('parametres', function($table) {
        $table->string('linkedin')->nullable();
        $table->string('twitter')->nullable();
        $table->string('facebook')->nullable();
        $table->string('numtel')->nullable();
        $table->string('adresse')->nullable();
        $table->string('email')->nullable();
        $table->string('lienMap')->nullable();
        $table->longText('presentation')->nullable();


    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
        $table->dropColumn('paid');
    });
    }
}
