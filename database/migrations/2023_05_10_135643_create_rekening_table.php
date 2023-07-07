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
        Schema::create('rekenings', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_rekening')->unique();
            // $table->foreignId('id_user')->unsigned();
            $table->foreignId('id_author')->nullable();
            $table->string('atas_nama');
            $table->string('bank');
            $table->unsignedBigInteger('saldo')->default(0);

            $table->timestamps();

            // $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_author')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekenings');
    }
};
