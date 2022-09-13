<?php

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

Route::get('/produksi', function () {
    return view('produksi.index');
}) -> name('produksi');

Route::get('/pengiriman', function () {
    return view('pengiriman.index');
}) -> name('pengiriman');

Route::get('/rekap_subkon', function () {
    return view('rekapsubkon.index');
}) -> name('rekap_subkon');