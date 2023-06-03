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
        Schema::create('sapis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jenis_sapi')->unsigned();
            $table->foreignId('id_author')->nullable();
            $table->string('eartag');
            $table->unsignedInteger('harga_pokok');
            $table->unsignedSmallInteger('bobot');
            $table->unsignedInteger('harga_kiloan')->nullable();
            $table->unsignedInteger('harga_ekor')->nullable();
            $table->string('kondisi')->nullable();
            $table->enum('status', ['ADA', 'DIBELI', 'SOLD'])->default('ADA');
            // $table->foreignId('id_author')->unsigned();
            $table->string('keterangan')->nullable();
            $table->enum('jenis_kelamin', ['jantan', 'betina']);
            $table->timestamps();

            // $table->foreign('id_author')->references('id')->on('users');
            $table->foreign('id_jenis_sapi')->references('id')->on('jenis_sapis');
            $table->foreign('id_author')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sapis');
    }
};
