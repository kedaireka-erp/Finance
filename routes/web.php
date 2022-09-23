<?php

use App\Http\Livewire\TableProduksi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard.dashboard');
}) -> name('dashboard');

// BAGIAN PRODUKSI 
Route::get('produksi', App\Http\Livewire\TableProduksi::class)->name('produksi');
Route::get('accproduksi', App\Http\Livewire\AccProduksi::class)->name('accproduksi');


// BAGIAN PENGIRIMAN
Route::get('pengiriman', App\Http\Livewire\TablePengiriman::class)->name('pengiriman');
Route::get('pengiriman/edit/{id}', [App\Http\Livewire\TablePengiriman::class,'edit'])->name('pengiriman.edit');
Route::post('pengiriman/update/{id}',[App\Http\Livewire\TablePengiriman::class,'update'])->name('pengiriman.update');

// BAGIAN History Pengiriman
Route::get('history-kirim',App\Http\Livewire\HistoryPengiriman::class)->name('history-kirim');

// BAGIAN Rekap-Subkon 
Route::get('rekap_subkon', App\Http\Livewire\RekapSubkon::class)->name('rekap_subkon');

// BAGIAN Approved Rekap-Subkon 
Route::get('list-approved', App\Http\Livewire\ListApproved::class)->name('list-approved');

