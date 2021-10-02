<?php

use App\Http\Controllers\InvoiceController;
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
    return json_encode('Not found');
});
Route::get('orden/{order_id}', [OrderController::class, 'index'])->name('order.index');
Route::post('orden', [OrderController::class, 'store'])->name('order.store');
Route::put('orden/{order_id}', [OrderController::class, 'update'])->name('order.update');
Route::delete('orden/{order_id}', [OrderController::class, 'destroy'])->name('order.destroy');
Route::put('pagar/{order_id}', [InvoiceController::class, 'update'])->name('invoice.update');
