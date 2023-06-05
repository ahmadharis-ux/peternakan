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
        Schema::create('detail_pemakaian_pakans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pemakaian_pakan')->unsigned();
            $table->foreignId('id_stok_pakan')->unsigned();
            $table->foreignId('id_author')->nullable();
            $table->unsignedInteger('subtotal');
            $table->unsignedInteger('qty');
            $table->string('keterangan')->nullable();

            $table->timestamps();

            $table->foreign('id_pemakaian_pakan')->references('id')->on('pemakaian_pakans');
            $table->foreign('id_stok_pakan')->references('id')->on('stok_pakans');
            $table->foreign('id_author')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pemakaian_pakans');
    }
};
