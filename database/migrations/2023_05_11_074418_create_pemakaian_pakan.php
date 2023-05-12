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
		Schema::create('pemakaian_pakan', function (Blueprint $table) {
			$table->id();
			$table->foreignId('id_author')->unsigned();
			$table->foreignId('id_pekerja')->unsigned();
			$table->foreignId('id_pakan')->unsigned();
			$table->foreignId('id_satuan_pakan')->unsigned();
			$table->unsignedInteger('nominal_pengeluaran');
			$table->unsignedInteger('qty');
			$table->string('keterangan');


			$table->timestamps();

			$table->foreign('id_author')->references('id')->on('users');
			$table->foreign('id_pekerja')->references('id')->on('users');
			$table->foreign('id_pakan')->references('id')->on('pakan');
			$table->foreign('id_satuan_pakan')->references('id')->on('satuan_pakan');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('riwayat_pemakaian_pakan');
	}
};
