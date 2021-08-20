@extends('layouts.template')

@section('doctitle', 'Crear nuevo curso')
@section('bodycontent')
    <div class="m-2">
        <h1 class="font-bold">Crear nuevo curso</h1>
        <a href="{{route('cursos.index')}}" class="h-5 w-5 text-blue-400">Back to courses</a>
        <hr />
        <div class="m-5">
            <form action="{{route('cursos.store')}}" method="POST">
                @csrf
                @method('POST')
                
                <div class="my-px">
                    <label for="name">Nombre:</label><br />
                    <input type="text" name="name" class="border border-black" value="{{old('name')}}" />
                    @error('name')
                        <small class="text-red-400">* {{$message}}</small>
                    @enderror
                </div>
                <div class="my-px">
                    <label for="description">Descripción:</label><br />
                    <textarea name="description" rows="5" class="border border-black">{{old('description')}}</textarea>
                    @error('description')
                        <small class="text-red-400">* {{$message}}</small>
                    @enderror
                </div>
                <div class="my-px">
                    <label for="categoria">Categoría:</label><br />
                    <input type="text" name="categoria" class="border border-black" value="{{old('categoria')}}" />
                    @error('categoria')
                        <small class="text-red-400">* {{$message}}</small>
                    @enderror
                </div>
                <div class="my-px">
                    <button type="submit" class="border border-black">Enviar</button>
                </div>
            </form>
        </div>
    </div>

@endsection