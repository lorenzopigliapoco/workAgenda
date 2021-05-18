<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgettosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progettos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_progetto')->unique();
            $table->text('descrizione',200);
            $table->text('note',50);
            $table->date('dataInizio');
            $table->date('dataFine');
            $table->float('costoOra');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('ssid_cliente')->unsigned()->nullable();
            $table->timestamps();      

            $table->foreign('user_id') 
                    ->references('id')
                    ->on('users');
                    
            $table->foreign('ssid_cliente') 
                    ->references('ssid')
                    ->on('clientes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
