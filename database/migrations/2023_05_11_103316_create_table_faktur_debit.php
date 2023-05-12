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
        Schema::create('table_faktur_debit', function (Blueprint $table) {
            $table->string('nomor_faktur');
            $table->foreignId('id_debit')->unsigned();
            $table->text('subject');
            $table->foreignId('id_author')->unsigned();

            $table->timestamps();

            $table->foreign('id_debit')->references('id')->on('debit');
            $table->foreign('id_author')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_faktur_debit');
    }
};