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
        Schema::create('stoks', function (Blueprint $table) {
            $table->id('id')->primary();
            $table->string('kode_produk')->unique();
            $table->string('nama_produk', 30);
            $table->date('tgl_produksi');
            $table->date('tgl_exp');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('satuan', 15);

            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->references('kode_produk')->on('produks');

            $table->unsignedBigInteger('produkmasuk_id');
            $table->foreign('produkmasuk_id')->references('id')->on('produk_masuks');

            $table->unsignedBigInteger('produkkeluar_id');
            $table->foreign('produkkeluar_id')->references('id')->on('produk_keluars');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stoks');
    }
};
