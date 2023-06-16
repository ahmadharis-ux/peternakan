<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fakturs', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_faktur');
            $table->foreignId('id_author')->unsigned();
            $table->foreignId('id_pihak_kedua')->unsigned();
            $table->foreignId('id_kredit')->unsigned()->nullable();
            $table->foreignId('id_debit')->unsigned()->nullable();

            $table->string('subjek')->nullable();

            $table->timestamps();

            $table->foreign('id_author')->references('id')->on('users');
            $table->foreign('id_pihak_kedua')->references('id')->on('users');
            $table->foreign('id_kredit')->references('id')->on('kredits');
            $table->foreign('id_debit')->references('id')->on('debits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_fakturs');
    }
};
