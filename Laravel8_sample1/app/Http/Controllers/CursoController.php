<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    //Por convencion, para mostrar página principal
    public function index(){
        return view('cursos.index');
    }

    //Por convencion, para crear entradas
    public function create(){
        return view('cursos.create');
    }

    //Por convencion, para mostrar entradas
    public function show($curso, $categoria = null){
        //compact('curso'); //Alternative: Creates an array to pass to view
        return view('cursos.show', ['curso' => $curso]);
        //return ($categoria) ? "Bienvenido al curso $curso de la categoría $categoria." : "Bienvenido al curso $curso.";
    }
}
