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
		Schema::create('operasional_pembelian_pakans', function (Blueprint $table) {
			$table->id();
			$table->foreignId('id_pembelian_pakan')->unsigned();
			$table->foreignId('id_author')->nullable();
			$table->unsignedBigInteger('harga');
			$table->string('keterangan');

			$table->timestamps();

			$table->foreign('id_pembelian_pakan')->references('id')->on('pembelian_pakans');
			$table->foreign('id_author')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('operasional_pembelian_pakans');
	}
};
