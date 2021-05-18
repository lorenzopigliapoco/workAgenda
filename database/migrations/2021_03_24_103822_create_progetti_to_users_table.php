<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgettiToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progetti_to_users', function (Blueprint $table) {
            $table->bigIncrements('numero');
            $table->bigInteger('utente_id')->unsigned();
            $table->bigInteger('progetto_id')->unsigned();

            $table->timestamps();

            $table->foreign('utente_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('progetto_id')->references('id')->on('progettos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progetti_to_users');

    }
}
