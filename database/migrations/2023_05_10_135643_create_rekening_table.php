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
		Schema::create('rekening', function (Blueprint $table) {
			$table->id();
			$table->string('nomor_rekening')->unique();
			$table->foreignId('id_user')->unsigned();
			$table->string('atas_nama');
			$table->string('bank');

			$table->timestamps();

			$table->foreign('id_user')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('rekening');
	}
};
