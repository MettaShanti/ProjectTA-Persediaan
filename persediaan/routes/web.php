<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukKeluarController;
use App\Http\Controllers\ProdukMasukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
Route::resource('produk', ProdukController::class);//->middleware(['auth', 'verified', 'Ceklevel:admin']);
Route::resource('produkMasuk', ProdukMasukController::class);//->middleware(['auth', 'verified', 'Ceklevel:admin']);
Route::resource('produkKeluar', ProdukKeluarController::class);//->middleware(['auth', 'verified', 'Ceklevel:admin']);
Route::resource('supplier', SupplierController::class);//->middleware(['auth', 'verified', 'Ceklevel:admin']);
Route::resource('stok', StokController::class);//->middleware(['auth', 'verified', 'Ceklevel:user']);
Route::resource('user', UserController::class);//->middleware(['auth', 'verified', 'Ceklevel:user']);


// logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

//laporan produk masuk
Route::get('/laporanpm', [ProdukMasukController::class, 'indexLaporan'])->name('laporanpm.index');
Route::get('/laporanpm/cetak', [ProdukMasukController::class, 'cetakLaporan'])->name('laporanpm.cetak');
