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
        Schema::create('detail_pembelian_sapi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pembelian_sapi')->unsigned();
            $table->foreignId('id_jenis_sapi')->unsigned();
            $table->string('eartag');
            $table->enum('jenis_kelamin', ['jantan', 'betina']);
            $table->unsignedSmallInteger('bobot')->default(0);
            $table->unsignedInteger('harga')->default(0);
            $table->boolean('kiloan')->default(false);
            $table->string('keterangan')->nullable();



            $table->timestamps();
            $table->foreign('id_pembelian_sapi')->references('id')->on('pembelian_sapi');
            $table->foreign('id_jenis_sapi')->references('id')->on('jenis_sapi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembelian_sapi');
    }
};