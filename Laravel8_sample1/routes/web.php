<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

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
Route::get('/', HomeController::class)->name('home');

/*Route::get('cursos', [CursoController::class, 'index'])->name('cursos.index');
Route::get('cursos/create', [CursoController::class, 'create'])->name('cursos.create');
Route::post('cursos', [CursoController::class, 'store'])->name('cursos.store');
Route::get('cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
Route::put('cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');
Route::get('cursos/{curso}/{categoria?}', [CursoController::class, 'show'])->name('cursos.show');
Route::delete('cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');*/

//Se crean ResourceVerbs para cambiar los nombres en las URL (AppServiceProvider.php o también en RouteServiceProvider.php)
Route::resource('cursos', CursoController::class);
//Route::resource('materias', CursoController::class)->parameters(['materias' => 'curso'])->names('cursos');

Route::view('nosotros', 'us')->name('nosotros');

Route::get('contactanos', function () {
    $correo = new ContactanosMailable;
    Mail::to('fabianmurillo.01@gmail.com')->send($correo);

    return "Mensaje enviado";
});