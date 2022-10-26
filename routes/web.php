<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\AccProduksi;
use App\Http\Livewire\TableProduksi;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\TablePengiriman;
use App\Http\Livewire\HistoryPengiriman;
use App\Http\Controllers\LoginController;

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

Route::get("/login", [LoginController::class, "index"])->name("login");

Route::post("/login", [LoginController::class, "login"]);

// Route::group(['middleware' => ['auth']], function() {
Route::middleware('role:Finance|Manager Finance|Admin')->group(function () {
    // Route::get('/', function () {
//     return view('dashboard.dashboard');
// }) -> name('dashboard');
Route::get('/', App\Http\Livewire\Dashboard::class)->name('dashboard');

// BAGIAN PRODUKSI 
Route::get('produksi', App\Http\Livewire\TableProduksi::class)->name('produksi');
Route::get('accproduksi', App\Http\Livewire\AccProduksi::class)->name('accproduksi')->middleware('role:Manager Finance|Admin');


// BAGIAN PENGIRIMAN
Route::get('pengiriman', App\Http\Livewire\TablePengiriman::class)->name('pengiriman');
Route::get('pengiriman/edit/{id}', [App\Http\Livewire\TablePengiriman::class,'edit'])->name('pengiriman.edit');
Route::post('pengiriman/update/{id}',[App\Http\Livewire\TablePengiriman::class,'update'])->name('pengiriman.update');

// BAGIAN History Pengiriman
Route::get('history-kirim',App\Http\Livewire\HistoryPengiriman::class)->name('history-kirim')->middleware('role:Manager Finance|Admin');

// BAGIAN Rekap-Subkon 
Route::get('rekap_subkon', App\Http\Livewire\RekapSubkon::class)->name('rekap_subkon');

// BAGIAN Approved Rekap-Subkon 
Route::get('list-approved', App\Http\Livewire\ListApproved::class)->name('list-approved');

Route::post("/logout", [LoginController::class, "logout"])->name("logout");
});