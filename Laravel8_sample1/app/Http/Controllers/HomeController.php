<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //El controlador administra una única ruta
    public function __invoke(){
        return view('home');
    }
}
