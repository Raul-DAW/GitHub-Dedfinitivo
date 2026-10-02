<?php 
 
namespace App\Http\Controllers; 
 
class SegundoControlador extends Controller 
{ 
    public function primerMetodo() 
    { 
        return view('welcome'); 
    } 
 
    function enlaces() 
    { 
        echo ' 
        <ul> 
            <li><a href="../">Inicio</a></li>  
            <li><a href="../mensaje">Mensaje</a></li> 
            <li><a href="/primerMetodo">Primer método</a></li> 
        </ul> 
        '; 
    } 
} 

/*Primera ruita=> ../**/ 
/*Segunda ruita=> ../mensaje* 
/*Tercera ruta*/