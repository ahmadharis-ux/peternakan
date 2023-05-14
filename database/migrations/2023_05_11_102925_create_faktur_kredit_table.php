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
        Schema::create('faktur_kredits', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_faktur');
            $table->foreignId('id_kredits')->unsigned();
            $table->text('subject');
            $table->foreignId('id_author')->unsigned();

            $table->timestamps();

            $table->foreign('id_kredits')->references('id')->on('kredits');
            $table->foreign('id_author')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faktur_kredits');
    }
};
