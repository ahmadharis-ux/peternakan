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
        Schema::create('debits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kas')->unsigned();
            $table->foreignId('id_jurnal')->unsigned();
            $table->foreignId('id_author')->unsigned();
            // $table->foreignId('id_pihak_kedua')->unsigned();
            $table->unsignedInteger('nominal')->default(0);
            $table->string('keterangan')->nullable();
            $table->boolean('lunas')->default(false);
            $table->date('tenggat')->nullable();


            $table->timestamps();

            $table->foreign('id_kas')->references('id')->on('kas');
            $table->foreign('id_jurnal')->references('id')->on('jurnals');
            $table->foreign('id_author')->references('id')->on('users');
            // $table->foreign('id_pihak_kedua')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debits');
    }
};
