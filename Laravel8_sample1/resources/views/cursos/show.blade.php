@extends('layouts.template')

@section('doctitle', 'Curso '.$curso)
@section('bodycontent')
    <h1>Bienvenido al curso {{$curso}}</h1>
@endsection