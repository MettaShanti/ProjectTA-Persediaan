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
        Schema::create('produk_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_produk', 10)->unique();
            $table->string('nama_produk', 30);
            $table->date('tgl_masuk');
            $table->date('tgl_produksi');
            $table->date('tgl_exp');
            $table->integer('jumlah');
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->references('id')->on('produks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_masuks');
    }
};
