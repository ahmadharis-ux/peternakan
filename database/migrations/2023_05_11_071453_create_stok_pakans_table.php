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
        Schema::create('stok_pakans', function (Blueprint $table) {
            $table->id();
			$table->foreignId('id_pakan')->unsigned();
			$table->foreignId('id_satuan_pakan')->unsigned();
			$table->foreignId('id_author')->nullable();
			$table->unsignedInteger('harga');
            $table->integer('stok');

			$table->timestamps();
			$table->foreign('id_satuan_pakan')->references('id')->on('satuan_pakans');
			$table->foreign('id_pakan')->references('id')->on('pakans');
			$table->foreign('id_author')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stok_pakans');
    }
};
