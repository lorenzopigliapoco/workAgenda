<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->string('ragSoc')->unique();
            $table->string('nomeRef');
            $table->string('cognomeRef');
            $table->string('emailRef');
            $table->bigInteger('ssid')->unsigned();
            $table->string('PEC')->unique();
            $table->string('PIVA')->unique();
            $table->timestamps();
            
            $table->primary('ssid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
        Schema::disableForeignKeyConstraints();
    }
}
