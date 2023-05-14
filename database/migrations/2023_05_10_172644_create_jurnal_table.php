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
		Schema::create('jurnals', function (Blueprint $table) {
			$table->id();
			$table->string('nama');
			$table->foreignId('id_kode_jurnal');
			$table->foreignId('id_author')->unsigned();

			$table->timestamps();

			$table->foreign('id_author')->references('id')->on('users');
			$table->foreign('id_kode_jurnal')->references('id')->on('kode_jurnal');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('jurnal');
	}
};
