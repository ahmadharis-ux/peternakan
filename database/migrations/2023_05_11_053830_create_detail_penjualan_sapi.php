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
		Schema::create('detail_penjualan_sapis', function (Blueprint $table) {
			$table->id();
			$table->foreignId('id_penjualan_sapis')->unsigned();
			$table->foreignId('id_sapis')->unsigned();
			$table->unsignedSmallInteger('bobot')->default(0);
			$table->integer('harga')->default(0);
			$table->boolean('kiloan')->default(false);
			$table->string('keterangan')->nullable();




			$table->timestamps();
			$table->foreign('id_penjualan_sapis')->references('id')->on('penjualan_sapis');
			$table->foreign('id_sapis')->references('id')->on('sapis');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('detail_penjualan_sapis');
	}
};
