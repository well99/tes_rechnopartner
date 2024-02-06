<?php

use App\Http\Controllers\TransaksiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('transaksi', [TransaksiController::class, 'index']);
Route::post('transaksi/add', [TransaksiController::class, 'store']);
Route::patch('transaksi/update/{id}', [TransaksiController::class, 'update']);
Route::delete('transaksi/remove/{id}', [TransaksiController::class, 'remove']);
