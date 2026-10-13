<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlumnoController extends Controller
{

  public function create(): View {
    //
    return view('alumno.create', []);
}

public function destroy(Alumno $alumno): RedirectResponse {
    return redirect()->route('index');
}

public function edit(Alumno $alumno): View {
    //
    return view('alumno.edit', []);

}

public function index(): View {
    //
   /* $alumno = 'select * from alumno';*/
    $alumno = Alumno::all();
    //dd($alumno);
    return view('alumno.index', ['alumno' => $alumno]);

}




public function show(Alumno $alumno): View {
    //
    dd($alumno);
    return view('alumno.show', ['alumno' => $alumno]);

}

/*public function store(Request $request): RedirectResponse {
    return redirect()->route('index');

}
    */

public function store(Request $request)
{
    // dd($request->all());

    $alumno = new Alumno($request->all()); /*enseña todos los datos que me lleguen */

    $alumno->save();
    dd($alumno);

    /*
    $alumno->nombre = $request->nombre;
    $alumno->apellido = $request->apellido;
    $alumno->genero = $request->genero;
    $alumno->fnac = $request->fnac;
    $alumno->nacceso = $request->nacceso;

    $alumno->save();
    dd($alumno);
    */
}

public function update(Request $request, Alumno $alumno): RedirectResponse {
    return redirect()->route('index');

}



}