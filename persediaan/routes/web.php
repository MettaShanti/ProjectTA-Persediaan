<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukKeluarController;
use App\Http\Controllers\ProdukMasukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('produk', ProdukController::class)->parameters([
    'produk' => 'kode_produk'
]);
Route::resource('produkMasuk', ProdukMasukController::class)->parameters([
    'produkMasuk' => 'kode_produk'
]);
Route::resource('produkKeluar', ProdukKeluarController::class)->parameters([
    'produkKeluar' => 'kode_produk'
]);
Route::resource('supplier', SupplierController::class)->parameters([
    'supplier' => 'id'
]);
Route::resource('stok', StokController::class)->parameters([
    'stok' => 'id'
]);
Route::resource('user', UserController::class)->parameters([
    'user' => 'id'
]);

require __DIR__.'/auth.php';
