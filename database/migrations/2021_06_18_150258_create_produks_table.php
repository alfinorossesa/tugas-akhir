<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_produk', 100);
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('user_id');
            $table->string('stok', 100);
            $table->text('deskripsi');
            $table->integer('harga');
            $table->unsignedBigInteger('lokasi_id');
            $table->string('foto_produk', 100);
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brand');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('lokasi_id')->references('id')->on('lokasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
