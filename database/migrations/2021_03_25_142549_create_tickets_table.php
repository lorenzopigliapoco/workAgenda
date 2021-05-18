<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->bigInteger('progetto')->unsigned();
            $table->float('ore_spese');
            $table->string('note')->nullable();
            $table->bigInteger('utente')->unsigned();
            
            $table->timestamps();

            //$table->foreign('progetto')->references('progetto_id')->on('progetti_to_users');
            //$table->foreign('utente')->references('utente_id')->on('progetti_to_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
