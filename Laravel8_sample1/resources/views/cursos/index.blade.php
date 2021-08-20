@extends('layouts.template')

@section('doctitle', 'Cursos')
@section('bodycontent')
    <div class="m-2">
        <h1 class="font-bold">Bienvenido al listado de cursos</h1>
        <a href="{{route('cursos.create')}}" class="h-5 w-5 text-blue-400">Create course</a>
        <hr />
        <div class="m-5">
            <ul>
                @foreach ($cursos as $curso)
                    <li>- <a class="h-5 text-blue-400" href="{{route('cursos.show', $curso->id)}}">{{ $curso->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    {{$cursos->links()}}
@endsection