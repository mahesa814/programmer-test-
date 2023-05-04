<?php

use App\Http\Controllers\NasabahController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [NasabahController::class, 'index'])->name('nasabah.index');
Route::post('/nasbaha/create', [NasabahController::class, 'store'])->name('nasabah.store');
Route::get('/transaksi', [TransactionController::class, 'index'])->name('transaction.index');
Route::post('/transaksi/create', [TransactionController::class, 'store'])->name('transaction.store');
Route::get('/point', [TransactionController::class, 'getPoints'])->name('point.index');
Route::get('/report', [ReportController::class, 'index'])->name('report.index');
