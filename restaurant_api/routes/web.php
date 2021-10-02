<?php

use App\Http\Controllers\OrderController;
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
    return view('welcome');
});
Route::get('orden', function () {
    return 'welcome';
});
Route::get('orden/{orden}', [OrderController::class, 'index'])->name('orden.index');
Route::post('orden', [OrderController::class, 'store'])->name('orden.store');
Route::put('orden/{orden}', [OrderController::class, 'update'])->name('orden.update');
Route::delete('orden/{orden}', [OrderController::class, 'destroy'])->name('orden.destroy');
