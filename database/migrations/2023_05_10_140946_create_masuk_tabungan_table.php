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
        Schema::create('masuk_tabungan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->unsigned();
            $table->foreignId('id_author')->unsigned();
            $table->unsignedInteger('nominal');
            $table->foreignId('id_rekening')->unsigned();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_author')->references('id')->on('users');
            $table->foreign('id_rekening')->references('id')->on('rekening');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masuk_tabungan');
    }
};
