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
		Schema::create('pemakaian_pakans', function (Blueprint $table) {
			$table->id();
			$table->foreignId('id_author')->unsigned();
			$table->foreignId('id_pekerja')->unsigned();
			$table->foreignId('id_pakans')->unsigned();
			$table->foreignId('id_satuan_pakans')->unsigned();
			$table->unsignedInteger('nominal_pengeluaran');
			$table->unsignedInteger('qty');
			$table->string('keterangan');


			$table->timestamps();

			$table->foreign('id_author')->references('id')->on('users');
			$table->foreign('id_pekerja')->references('id')->on('users');
			$table->foreign('id_pakans')->references('id')->on('pakans');
			$table->foreign('id_satuan_pakans')->references('id')->on('satuan_pakans');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('riwayat_pemakaian_pakans');
	}
};
