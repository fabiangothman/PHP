<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactanos;
use Illuminate\Http\Request;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    //Por convencion, para guardar entradas
    public function index(){
        return view('contactanos.index');
    }

    public function store(StoreContactanos $request){
        $correo = new ContactanosMailable($request->all());
        Mail::to('fabianmurillo.01@gmail.com')->send($correo);

        return redirect()->route('contactanos.index')->with('info', 'Mensaje enviado con éxito');
    }
}
