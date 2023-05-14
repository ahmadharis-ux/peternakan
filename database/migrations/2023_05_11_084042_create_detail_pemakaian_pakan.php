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
		Schema::create('detail_pemakaian_pakans', function (Blueprint $table) {
			$table->id();
			$table->foreignId('id_pemakaian_pakan')->unsigned();
			$table->foreignId('id_sapi')->unsigned();
			$table->unsignedInteger('markup');

			$table->timestamps();

			$table->foreign('id_pemakaian_pakan')->references('id')->on('pemakaian_pakan');
			$table->foreign('id_sapi')->references('id')->on('sapi');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('detail_pemakaian_pakan');
	}
};
