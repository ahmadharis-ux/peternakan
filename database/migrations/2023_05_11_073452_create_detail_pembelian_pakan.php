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
		Schema::create('detail_pembelian_pakans', function (Blueprint $table) {
			$table->id();
			$table->foreignId('id_pembelian_pakan')->unsigned();
			$table->foreignId('id_pakan')->unsigned();
			$table->foreignId('id_satuan_pakan')->unsigned();
			$table->unsignedInteger('harga')->default(0);
			$table->unsignedInteger('qty')->default(0);
			$table->unsignedInteger('subtotal')->default(0);
			$table->string('keterangan')->nullable();

			$table->timestamps();

			$table->foreign('id_pembelian_pakan')->references('id')->on('pembelian_pakans');
			$table->foreign('id_pakan')->references('id')->on('pakans');
			$table->foreign('id_satuan_pakan')->references('id')->on('satuan_pakans');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('detail_pembelian_pakans');
	}
};
