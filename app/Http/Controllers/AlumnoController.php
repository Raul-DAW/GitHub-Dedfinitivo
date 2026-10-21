<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use \Exception;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class AlumnoController extends Controller
{

private const RULES= [
    'nombre' =>    'required|string|max:100|min:2',
      'apellido' => 'required|string|max:130|min:3',
      'fnac' =>      'nullable|date|before_or_equal:today',
      'nacceso' =>   'nullable|numeric|gte:0|lte:10|decimal:0,2',
      'genero' =>    'nullable|in:masculino,femenino,otro'
];

private const MESSAGES =  [
    //Nombre
    'nombre.required' => 'El nombre es obligatorio.',
    'nombre.string'   => 'El nombre debe ser una cadena de texto.',
    'nombre.max'      => 'El nombre no puede superar los 100 caracteres.',
    'nombre.min'      => 'El nombre debe tener al menos 2 caracteres.',

    //Apellidos
    'apellido.required' => 'Los apellidos son obligatorios.',
    'apellido.string'   => 'Los apellidos deben ser una cadena de texto.',
    'apellido.max'      => 'Los apellidos no pueden superar los 130 caracteres.',
    'apellido.min'      => 'Los apellidos deben tener al menos 3 caracteres.',
     
    //Fecha de nacimiento
    'fnac.date'             => 'La fecha de nacimiento no es válida.',
    'fnac.before_or_equal'  => 'La fecha de nacimiento no puede ser futura.',

    //Nota de acceso
    'nacceso.numeric' => 'La nota de acceso debe ser un número.',
    'nacceso.gte'     => 'La nota de acceso no puede ser inferior a 0.',
    'nacceso.lte'     => 'La nota de acceso no puede ser superior a 10.',
    'nacceso.decimal' => 'La nota de acceso debe tener como máximo 2 decimales.',

    'genero.in' => 'El género seleccionado no es válido.',
 ];

public function create(): View {
    //
    return view('alumno.create', []);
}

public function destroy(Alumno $alumno): RedirectResponse {
    try {
        $alumno->delete();
    } catch (Exception $e) {
        return back()->withInput()->withErrors([
            'error' => 'Error al borrar el alumno',
            // 'nombre' => 'Este campo forma parte de la clave única',
            //'apellido' => 'Este campo también forma parte de la clave única',
        ]);
    }

    return redirect()->route('alumno.index')->with(['succes' => 'Se ha borrado el alumno correctamente']);
    //dd(['destroy', $alumno]);
}

public function edit(Alumno $alumno): View {
    //
    return view('alumno.edit', ['alumno' => $alumno]);

}

public function index(): View {
    //
   /* $alumno = 'select * from alumno';*/
   //session()->forget('success');
    $alumno = Alumno::all();
    //dd($alumno);
    return view('alumno.index', ['alumno' => $alumno]);

}

public function show(Alumno $alumno): View {
    //
    //dd($alumno);
    return view('alumno.show', ['alumno' => $alumno]);

}

/*public function store(Request $request): RedirectResponse {
    return redirect()->route('index');

}
    */

public function store(Request $request){
    // dd($request->all());
    //1ºValidar
    $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);

    if($validator -> fails()){
        return back()->withInput() ->withErrors($validator);
    }

    $alumno = new Alumno($request->all()); /*enseña todos los datos que me lleguen */

    try {
        $alumno->save();

    } catch (\Illuminate\Database\UniqueConstraintViolationException $e) {
        // Error por duplicar un valor único
        return back()->withInput()->withErrors([
            'error' => 'Clave única duplicada',
            // 'nombre' => 'Este campo forma parte de la clave única',
            //'apellido' => 'Este campo también forma parte de la clave única',
        ]);

    } catch (\Exception $e) {
        // Otros errores
        return back()->withInput()->withErrors([
            'error' => 'Error al crear el alumno',
            // 'nombre' => 'Este campo forma parte de la clave única',
            //'apellido' => 'Este campo también forma parte de la clave única',
        ]);
    }

    /*$alumno->save();*/
    //session(['succes' => 'Se ha creado el alumno correctamente V2']);
    return redirect()->route('alumno.index')->with(['succes' => 'Se ha creado el alumno correctamente']);

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
    //actualizar el alumno
    $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);

    if($validator -> fails()){
        return back()->withInput() ->withErrors($validator);
    }

    try {
        $alumno->update($request->all());

    } catch (\Illuminate\Database\UniqueConstraintViolationException $e) {
        // Error por duplicar un valor único
        return back()->withInput()->withErrors([
            'error' => 'Clave única duplicada',
            // 'nombre' => 'Este campo forma parte de la clave única',
            //'apellido' => 'Este campo también forma parte de la clave única',
        ]);

    } catch (\Exception $e) {
        return back()->withInput()->withErrors([
            'error' => 'Error al editar el alumno',
            // 'nombre' => 'Este campo forma parte de la clave única',
            //'apellido' => 'Este campo también forma parte de la clave única',
        ]);
    }

    return redirect()->route('alumno.index')->with(['succes' => 'Se ha editado el alumno correctamente']);
}

}













/*
|--------------------------------------------------------------------------
| CÓDIGO REPETIDO
|--------------------------------------------------------------------------
| Esta forma hace lo mismo que las constantes RULES y MESSAGES de arriba.
| Se deja comentada para conservarla.
|--------------------------------------------------------------------------
*/


// private static function getRules(): array{
//     return[
//         'nombre' =>    'required|string|max:100|min:2',
//         'apellido' => 'required|string|max:130|min:3',
//         'fnac' =>      'nullable|date|before_or_equal:today',
//         'nacceso' =>   'nullable|numeric|gte:0|lte:10|decimal:0,2',
//         'genero' =>    'nullable|in:masculino,femenino,otro'
//     ];
// }
//
//$rules = self::getRules();
   // $messages = self::getMessages();
// private static function getMessages(): array{
//     return [
//         'nombre.required' => 'El nombre es obligatorio.',
//         'nombre.string'   => 'El nombre debe ser una cadena de texto.',
//         'nombre.max'      => 'El nombre no puede superar los 100 caracteres.',
//         'nombre.min'      => 'El nombre debe tener al menos 2 caracteres.',

//         'apellido.required' => 'Los apellidos son obligatorios.',
//         'apellido.string'   => 'Los apellidos deben ser una cadena de texto.',
//         'apellido.max'      => 'Los apellidos no pueden superar los 130 caracteres.',
//         'apellido.min'      => 'Los apellidos deben tener al menos 3 caracteres.',

//         'fnac.date'             => 'La fecha de nacimiento no es válida.',
//         'fnac.before_or_equal'  => 'La fecha de nacimiento no puede ser futura.',

//         'nacceso.numeric' => 'La nota de acceso debe ser un número.',
//         'nacceso.gte'     => 'La nota de acceso no puede ser inferior a 0.',
//         'nacceso.lte'     => 'La nota de acceso no puede ser superior a 10.',
//         'nacceso.decimal' => 'La nota de acceso debe tener como máximo 2 decimales.',

//         'genero.in' => 'El género seleccionado no es válido.',
//     ];
// }


// Estas líneas pertenecían a la forma anterior usando getRules() y getMessages():
//
// $rules = self::getRules();
// $messages = self::getMessages();
