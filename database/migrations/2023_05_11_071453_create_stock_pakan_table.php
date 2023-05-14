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
		Schema::create('stok_pakans', function (Blueprint $table) {
			$table->id();
			$table->foreignId('id_pakans')->unsigned();
			$table->foreignId('id_satuan_pakans')->unsigned();
			$table->unsignedInteger('harga');

			$table->timestamps();
			$table->foreign('id_satuan_pakans')->references('id')->on('satuan_pakans');
			$table->foreign('id_pakans')->references('id')->on('pakans');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('stok_pakans');
	}
};
