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
        Schema::create('riwayat_bobot_sapis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jenis_sapis')->unsigned();
            $table->unsignedSmallInteger('bobot');
            $table->foreignId('id_author')->unsigned();
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('id_author')->references('id')->on('users');
            $table->foreign('id_jenis_sapis')->references('id')->on('jenis_sapis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_bobot_sapis');
    }
};
