<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    //Por convencion, para mostrar página principal
    public function index(){
        $cursos = Curso::orderBy('id', 'desc')->paginate(10);
        return view('cursos.index', compact('cursos'));
    }

    //Por convencion, para crear entradas
    public function create(){
        return view('cursos.create');
    }

    //Por convencion, para guardar entradas
    public function store(Request $request){
        //return $request->all();
        $curso = new Curso();
        $curso->name = $request->name;
        $curso->description = $request->description;
        $curso->categoria = $request->categoria;
        $curso->save();
        return redirect()->route('cursos.show', $curso);
    }

    //Por convencion, para mostrar entradas
    //Automatically Laravel search the ID into "curso" and query to BD the data
    public function show(Curso $curso, $categoria = null){
        //$curso = Curso::find($id);
        //compact('curso'); //Alternative: Creates an array to pass to view
        return view('cursos.show', ['curso' => $curso]);
        //return ($categoria) ? "Bienvenido al curso $curso de la categoría $categoria." : "Bienvenido al curso $curso.";
    }

    //Por convencion, para guardar entradas
    //Automatically Laravel search the ID into "curso" and query to BD the data
    public function edit(Curso $curso){
        return view('cursos.edit', ['curso' => $curso]);
    }

    //Por convencion, para guardar entradas
    public function update(Request $request, Curso $curso){
        $curso->name = $request->name;
        $curso->description = $request->description;
        $curso->categoria = $request->categoria;
        $curso->save();
        return redirect()->route('cursos.show', $curso);
    }
}
