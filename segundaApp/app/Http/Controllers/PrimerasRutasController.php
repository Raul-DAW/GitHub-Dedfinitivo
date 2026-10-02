<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimerasRutasController extends Controller
{
   function index()
{
    return view('freelance.base');
}

    function primerMensaje()
    {
        echo '<h1>Yo soy el <a href="/">primer metodo</a></h1>';
    }
}
