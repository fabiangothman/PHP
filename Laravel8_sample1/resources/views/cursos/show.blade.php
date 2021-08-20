@extends('layouts.template')

@section('doctitle', 'Curso '.$curso->name)
@section('bodycontent')
    <div class="m-2">
        <h1 class="font-bold">Bienvenido al curso {{$curso->name}}</h1>
        <a href="{{route('cursos.index')}}" class="h-5 w-5 text-blue-400">Back to courses</a>
        <br />
        <a href="{{route('cursos.edit', $curso)}}" class="h-5 w-5 text-blue-400">Edit course</a>
        <hr />
        <div class="m-5">
            <p><strong>Categoria:</strong> {{$curso->categoria}}</p>
            <p>Descripción: {{$curso->description}}</p>
        </div>
    </div>

@endsection