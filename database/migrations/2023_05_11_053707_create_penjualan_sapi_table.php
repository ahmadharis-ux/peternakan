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
		Schema::create('penjualan_sapis', function (Blueprint $table) {
			$table->id();
			$table->foreignId('id_author')->unsigned();
			$table->foreignId('id_debit')->unsigned();
			$table->string('keterangan')->nullable();

			$table->timestamps();
			$table->foreign('id_author')->references('id')->on('users');
			$table->foreign('id_debit')->references('id')->on('debit');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('penjualan_sapi');
	}
};
