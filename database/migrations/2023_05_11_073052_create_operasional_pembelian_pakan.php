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
        Schema::create('operasional_pembelian_pakan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pembelian_pakan')->unsigned();
            $table->integer('harga');
            $table->string('keterangan');

            $table->timestamps();

            $table->foreign('id_pembelian_pakan')->references('id')->on('pembelian_pakan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operasional_pembelian_pakan');
    }
};
