<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    function about()
    {
        return view('about');
    }

    /*
    function aboutMetodo()
    {
        return view('about');
    }
    */

    function index()
    {
        return view('index');
    }

    function portfolio()
    {
        return view('portfolio');
    }

    function array(): View
    {
        // Array prehistórico
        $array1 = array();

        // Array actual
        $array2 = [];

        $array = ['Juan', 'Pepe', 'María'];

        $array[] = 'Juan';
        $array[] = 'Pepe';
        $array[] = 'María';

        $array2 = ['item1', 'item2', 'item3'];
        $array2[10] = 'Elizabeth';
        $array2[] = 'Paco';

        $array3 = ['Juan', 'Pepe', 'María'];
        $alumnos = [
    ['nombre' => 'Ajarif Saika, Fátima', 'edad' => 20],
    ['nombre' => 'Albarrán Joya, Antonio', 'edad' => 21],
    ['nombre' => 'Burgos Tomé, Adrián', 'edad' => 19],
    ['nombre' => 'Carrascosa Delgado, Pablo', 'edad' => 22],
    ['nombre' => 'Castillo García, Joaquín', 'edad' => 21],
    ['nombre' => 'El Issmail Al Assaf, Amara', 'edad' => 30],
    ['nombre' => 'Fernández Álvarez, Adrián', 'edad' => 21],
    ['nombre' => 'Galdón Fernández, Abraham', 'edad' => 23],
    ['nombre' => 'García González, Ignacio', 'edad' => 22],
    ['nombre' => 'García López, Pilar', 'edad' => 19],
    ['nombre' => 'Gorlat Castro, Raúl', 'edad' => 18],
    ['nombre' => 'Hernández Recio, Iván', 'edad' => 23],
    ['nombre' => 'Kordass Rjaf-Allah, Noussayr', 'edad' => 19],
    ['nombre' => 'Maldonado Navarro, Manuel', 'edad' => 23],
    ['nombre' => 'Montero Pelegrina, Pedro', 'edad' => 22],
    ['nombre' => 'Montoro Ruiz, Alba', 'edad' => 21],
    ['nombre' => 'Pérez Montalbán, Christian', 'edad' => 19],
    ['nombre' => 'Sánchez Sorroche, José', 'edad' => 20],
    ['nombre' => 'Serrano Rodríguez, Pablo', 'edad' => 21],
    ['nombre' => 'Vereda Orozco, Gonzalo Jesús', 'edad' => 20],
    ['nombre' => 'Vicaria García, Francisco Javier', 'edad' => 21],
    ['nombre' => 'Vilar Martín, Blas', 'edad' => 19],
    ['nombre' => 'Villegas Rivera, Luis', 'edad' => 20],
];

        $grupo = 'Segundo de Desarrollo de Aplicaciones Web A';

        return view('array', ['grupo' => $grupo,  'alumnos' => $alumnos, 'profesor' => 'Carmelo Vega'
        ]);
    }
}

