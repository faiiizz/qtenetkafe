<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('welcome');
});


Route::get('/catatan', 'App\Http\Controllers\CatatanController@index');
Route::get('/catatan/create', 'App\Http\Controllers\CatatanController@create');
Route::post('/catatan', 'App\Http\Controllers\CatatanController@store');
Route::get('/catatan/{catatan}', 'App\Http\Controllers\CatatanController@show');
Route::get('/catatan/{catatan}/edit', 'App\Http\Controllers\CatatanController@edit');
Route::put('/catatan/{catatan}', 'App\Http\Controllers\CatatanController@update');
Route::get('/catatan/{catatan}', 'App\Http\Controllers\CatatanController@destroy');

Route::get('/inventory', 'App\Http\Controllers\InventoryController@index');
Route::get('/inventory/create', 'App\Http\Controllers\InventoryController@create');
Route::post('/inventory', 'App\Http\Controllers\InventoryController@store');
Route::get('/inventory/{inventory}', 'App\Http\Controllers\InventoryController@show');
Route::get('/inventory/{inventory}/edit', 'App\Http\Controllers\InventoryController@edit');
Route::put('/inventory/{inventory}', 'App\Http\Controllers\InventoryController@update');
Route::get('/inventory/{inventory}', 'App\Http\Controllers\InventoryController@destroy');

Route::get('/pengambilan', 'App\Http\Controllers\PengambilanController@index');
Route::get('/pengambilan/create', 'App\Http\Controllers\PengambilanController@create');
Route::post('/pengambilan', 'App\Http\Controllers\PengambilanController@store');
Route::get('/pengambilan/{pengambilan}', 'App\Http\Controllers\PengambilanController@show');
Route::get('/pengambilan/{pengambilan}/edit', 'App\Http\Controllers\PengambilanController@edit');
Route::put('/pengambilan/{pengambilan}', 'App\Http\Controllers\PengambilanController@update');
Route::get('/pengambilan/{pengambilan}', 'App\Http\Controllers\PengambilanController@destroy');
