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
            $table->id();
            $table->string('kode_produk', 10)->unique();
            $table->string('nama_produk', 30);
            $table->integer('stok');
            $table->date('tgl_produksi');
            $table->date('tgl_exp');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('jenis', 15);
            $table->string('satuan', 15);
            $table->string('keterangan', 50)->nullable();
            // Relasi ke produk
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->references('id')->on('produks');

            // Relasi ke produk masuk
            $table->unsignedBigInteger('produkmasuk_id');
            $table->foreign('produkmasuk_id')->references('id')->on('produk_masuks');

            // Relasi ke produk keluar
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
