<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('operasional_penjualan_sapis', function (Blueprint $table) {
			$table->id();
			$table->foreignId('id_penjualan_sapi')->unsigned();
			$table->unsignedBigInteger('harga');
			$table->string('keterangan');

			$table->timestamps();
			$table->foreign('id_penjualan_sapi')->references('id')->on('penjualan_sapis');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('operasional_penjualan_sapi');
	}
};
