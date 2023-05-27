<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\AgenController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\TicketController;

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
    return view('welcome');
});



Route::resource('armada', ArmadaController::class);
Route::resource('pemesanan', PemesananController::class);


// Route for get armada for yajra post request.
Route::get('get-armada', [ArmadaController::class, 'getArmada'])->name('get-armada');
Route::get('get-pemesanan', [PemesananController::class, 'getPemesanan'])->name('get-pemesanan');
Route::get('get-armada', [ArmadaController::class, 'getArmada'])->name('get-armada');
Route::resource('agen', AgenController::class);
Route::get('get-agen', [AgenController::class, 'getAgen'])->name('get-agen');
Route::resource('kota', KotaController::class);
Route::get('get-kota', [KotaController::class, 'getkota'])->name('get-kota');
Route::resource('ticket', TicketController::class);
Route::get('get-ticket', [TicketController::class, 'getticket'])->name('get-ticket');
