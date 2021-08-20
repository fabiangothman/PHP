@extends('layouts.template')

@section('doctitle', 'Editar curso '.$curso->name)
@section('bodycontent')
    <div class="m-2">
        <h1 class="font-bold">Editar curso</h1>
        <a href="{{route('cursos.index')}}" class="h-5 w-5 text-blue-400">Back to courses</a>
        <hr />
        <div class="m-5">
            <form action="{{route('cursos.update', $curso)}}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="my-px">
                    <label for="name">Nombre:</label><br />
                    <input type="text" name="name" class="border border-black" value="{{$curso->name}}" />
                </div>
                <div class="my-px">
                    <label for="description">Descripción:</label><br />
                    <textarea name="description" rows="5" class="border border-black">{{$curso->description}}</textarea>
                </div>
                <div class="my-px">
                    <label for="categoria">Categoría:</label><br />
                    <input type="text" name="categoria" class="border border-black" value="{{$curso->categoria}}" />
                </div>
                <div class="my-px">
                    <button type="submit" class="border border-black">Actualizar</button>
                </div>
            </form>
        </div>
    </div>

@endsection