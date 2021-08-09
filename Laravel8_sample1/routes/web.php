<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;

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

/*Route::get('/', function () {
    //return view('welcome');
    return "Bienvenido al home";
});
Route::get('/', HomeController::class);

Route::get('cursos', function () {
    //return view('welcome');
    return "Bienvenido al listado de cursos";
});
Route::get('cursos/create', function () {
    return "Crear nuevo curso.";
});
//Variables/parametros opcionales
Route::get('cursos/{curso}/{categoria?}', function ($curso, $categoria = null) {
    return ($categoria) ? "Bienvenido al curso $curso de la categoría $categoria." : "Bienvenido al curso $curso.";
});*/

//Busca el metodo __invoke en el controller
Route::get('/', HomeController::class);

Route::get('cursos', [CursoController::class, 'index']);
Route::get('cursos/create', [CursoController::class, 'create']);
Route::get('cursos/{curso}/{categoria?}', [CursoController::class, 'show']);
