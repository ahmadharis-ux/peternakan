<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi_debits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_author')->unsigned();
            $table->foreignId('id_pihak_kedua')->unsigned();
            $table->foreignId('id_debit')->unsigned();
            $table->foreignId('id_rekening')->unsigned();
            $table->unsignedInteger('nominal')->default(0);
            $table->unsignedInteger('current_saldo');
            $table->string('keterangan')->nullable();

            // $table->unsignedInteger('adm')->default(0)->nullable();


            $table->timestamps();

            $table->foreign('id_author')->references('id')->on('users');
            $table->foreign('id_pihak_kedua')->references('id')->on('users');
            $table->foreign('id_debit')->references('id')->on('debits');
            $table->foreign('id_rekening')->references('id')->on('rekenings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_debits');
    }
};
