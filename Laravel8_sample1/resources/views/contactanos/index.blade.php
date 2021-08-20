@extends('layouts.template')

@section('doctitle', 'Contactanos ')
@section('bodycontent')
    <div class="m-2">
        <h1 class="font-bold">Dejanos un mensaje</h1>
        <div class="m-5">
            <!--    COMPONENTS  -->
            @if (session('info'))
                <script>//alert("{{session('info')}}");</script>
                <!--<x-alert color="yellow" title="Éxito" text="Mensaje enviado con éxito" />-->
                <x-alert color="green">
                    <x-slot name="title">Precaución</x-slot>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus voluptate modi, velit iusto eius aliquid. Assumenda tempore accusamus, similique officiis alias nisi repellendus praesentium nobis fugit, exercitationem quis voluptatem inventore!
                </x-alert>
            @endif

            <form action="{{route('contactanos.store')}}" method="POST">
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
                    <label for="correo">Correo:</label><br />
                    <input type="email" name="correo" class="border border-black" value="{{old('correo')}}" />
                    @error('correo')
                        <small class="text-red-400">* {{$message}}</small>
                    @enderror
                </div>
                <div class="my-px">
                    <label for="mensaje">Mensaje:</label><br />
                    <textarea name="mensaje" rows="5" class="border border-black">{{old('mensaje')}}</textarea>
                    @error('mensaje')
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