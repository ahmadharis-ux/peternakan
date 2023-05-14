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
		Schema::create('operasional_pembelian_sapis', function (Blueprint $table) {
			$table->id();
			$table->foreignId('id_pembelian_sapis')->unsigned();
			$table->integer('harga');
			$table->string('keterangan');

			$table->timestamps();
			$table->foreign('id_pembelian_sapis')->references('id')->on('pembelian_sapis');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('operasional_pembelian_sapis');
	}
};
