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
        Schema::create('debit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jurnal')->unsigned();
            $table->foreignId('id_author')->unsigned();
            $table->foreignId('id_pihak_kedua')->unsigned();
            $table->unsignedInteger('nominal');
            $table->string('keterangan');
            $table->boolean('lunas')->default(false);

            $table->timestamps();

            $table->foreign('id_jurnal')->references('id')->on('jurnal');
            $table->foreign('id_author')->references('id')->on('users');
            $table->foreign('id_pihak_kedua')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debit');
    }
};
