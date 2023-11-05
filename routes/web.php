<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// NIM: 6706220123
// Nama : Ihsan Muhammad Iqbal

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk daftar kendaraan
Route::get('/vehicles', [\App\Http\Controllers\VehicleController::class, 'index'])->middleware(['auth', 'verified'])->name('vehicles');

// Route untuk datatables kendaraan
Route::get('/getAllVehicles', [\App\Http\Controllers\VehicleController::class, 'getAllVehicles'])->middleware(['auth', 'verified'])->name('getAllVehicles');

// Route untuk daftar transaksi
Route::get('/transaksi', [\App\Http\Controllers\TransactionController::class, 'index'])->middleware(['auth', 'verified'])->name('transaksi');

// Route untuk datatables transaksi
Route::get('/getAllTransactions', [\App\Http\Controllers\TransactionController::class, 'getAllTransactions'])->middleware(['auth', 'verified'])->name('getAllTransactions');

// Route untuk tambah koleksi
Route::get('/transaksiTambah', [\App\Http\Controllers\TransactionController::class, 'create'])->middleware(['auth', 'verified'])->name('transaksiTambah');

// Route untuk menyimpan transaksi
Route::post('/transaksiStore', [\App\Http\Controllers\TransactionController::class, 'store'])->middleware(['auth', 'verified'])->name('transaksiStore');

Route::get('transaksiKembali/{id}', [\App\Http\Controllers\TransactionController::class, 'transaksiKembali'])->middleware(['auth', 'verified'])->name('transaksiKembali');

Route::post('/transaksiUpdate', [\App\Http\Controllers\TransactionController::class, 'update'])->middleware(['auth', 'verified'])->name('transaksiUpdate');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
