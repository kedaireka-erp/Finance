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
// Route::get('/produksi', function () {
//     return view('produksi.index');
// }) -> name('produksi');

// BAGIAN PENGIRIMAN
Route::get('pengiriman', App\Http\Livewire\TablePengiriman::class)->name('pengiriman');
// Route::get('/pengiriman', function () {
//     return view('pengiriman.index');
// }) -> name('pengiriman');

Route::get('pengiriman/edit/{id}', [App\Http\Livewire\TablePengiriman::class,'edit'])->name('pengiriman.edit');
Route::post('pengiriman/update/{id}',[App\Http\Livewire\TablePengiriman::class,'update'])->name('pengiriman.update');

// BAGIAN Rekap-Subkon 
Route::get('rekap_subkon', App\Http\Livewire\RekapSubkon::class)->name('rekap_subkon');
// Route::get('/rekap_subkon', function () {
//     return view('rekapsubkon.index');
// }) -> name('rekap_subkon');

// BAGIAN Approved Rekap-Subkon 
Route::get('/list-approved', function () {
    return view('listapproved.index');
}) -> name('list-approved');
