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
            $table->foreignId('id_pemakaian_pakans')->unsigned();
            $table->foreignId('id_sapis')->unsigned();
            $table->unsignedInteger('markup');

            $table->timestamps();

            $table->foreign('id_pemakaian_pakans')->references('id')->on('pemakaian_pakans');
            $table->foreign('id_sapis')->references('id')->on('sapis');
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
