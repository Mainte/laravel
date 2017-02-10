<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaAzienda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('azienda', function (Blueprint $table){
            $table->increments('id');
            $table->string('ragione_sociale', 255);
            $table->string('partita_iva', 11)->nullable();
            $table->string('codice_fiscale', 16)->nullable();
            $table->string('indirizzo', 255);
            $table->string('cap', 5);
            $table->string('localita', 255);
            $table->string('provincia', 2);
            $table->string('telefono', 20)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('cellulare', 20)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('web', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('azienda');
    }
}
