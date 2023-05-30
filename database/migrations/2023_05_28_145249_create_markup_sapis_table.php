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
        Schema::create('markup_sapis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pemakaian_pakan')->unsigned();
            $table->foreignId('id_sapi')->unsigned();
            $table->unsignedInteger('markup');
            $table->unsignedInteger('markup_pembulatan');

            $table->timestamps();

            $table->foreign('id_pemakaian_pakan')->references('id')->on('pemakaian_pakans');
            $table->foreign('id_sapi')->references('id')->on('sapis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('markup_sapis');
    }
};
