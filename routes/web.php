<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\DatpesController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengambilanController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('welcome');
});


// Route::resource('catatan', CatatanController::class);
Route::resource('inventory', InventoryController::class);
Route::resource('pemasukan', PemasukanController::class);
Route::resource('pengeluaran', PengeluaranController::class);
Route::resource('pemesanan', PemesananController::class);
Route::resource('datpes', DatpesController::class);
Route::resource('menu', MenuController::class);
Route::resource('profile', ProfileController::class);
Route::resource('pengambilan', PengambilanController::class);

Route::get('/catatan', 'App\Http\Controllers\CatatanController@index');
Route::get('/catatan/create', 'App\Http\Controllers\CatatanController@create');
Route::post('/catatan', 'App\Http\Controllers\CatatanController@store');
Route::get('/catatan/{catatan}', 'App\Http\Controllers\CatatanController@show');
Route::get('/catatan/{catatan}/edit', 'App\Http\Controllers\CatatanController@edit');
Route::put('/catatan/{catatan}', 'App\Http\Controllers\CatatanController@update');
Route::get('/catatan/{catatan}', 'App\Http\Controllers\CatatanController@destroy');
