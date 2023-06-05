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
        Schema::create('detail_penjualan_sapis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penjualan_sapi')->unsigned();
            $table->foreignId('id_sapi')->unsigned();
            $table->foreignId('id_author')->nullable();
            $table->unsignedInteger('bobot')->default(0);
            $table->unsignedBigInteger('harga')->default(0);
            $table->boolean('kiloan')->default(false);
            $table->string('keterangan')->nullable();

            $table->timestamps();
            $table->foreign('id_penjualan_sapi')->references('id')->on('penjualan_sapis');
            $table->foreign('id_sapi')->references('id')->on('sapis');
            $table->foreign('id_author')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualan_sapis');
    }
};
