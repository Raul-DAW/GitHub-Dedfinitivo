<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SegundasRutasController extends Controller
{
    function enlaces()
    {
        echo '
        <ul>
            <li><a href="../">enlace 1</a></li>
            <li><a href="../mensaje">enlace 2</a></li>
            <li><a href="">enlace 3</a></li>
        </ul>
        ';
    }
}
