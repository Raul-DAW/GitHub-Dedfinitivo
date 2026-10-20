<?php
namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use \Exception;
use Illuminate\Database\UniqueConstraintViolationException;

class ProfesorController extends Controller
{


private const RULES = [
    'nombre' => 'required|string|max:100|min:2',
    'apellido' => 'required|string|max:100|min:3',
    'especialidad' => 'required|string|max:100',
    'fchalt' => 'nullable|date|before_or_equal:today',
    'salario' => 'nullable|numeric|gte:0|decimal:0,2'
];

private const MESSAGES = [
    //Nombre
    'nombre.required' => 'El nombre es obligatorio.',
    'nombre.string' => 'El nombre debe ser una cadena de texto.',
    'nombre.max' => 'El nombre no puede superar los 100 caracteres.',
    'nombre.min' => 'El nombre debe tener al menos 2 caracteres.',

    //Apellidos
    'apellido.required' => 'Los apellidos son obligatorios.',
    'apellido.string' => 'Los apellidos deben ser una cadena de texto.',
    'apellido.max' => 'Los apellidos no pueden superar los 100 caracteres.',
    'apellido.min' => 'Los apellidos deben tener al menos 3 caracteres.',

    //Especialidad
    'especialidad.required' => 'La especialidad es obligatoria.',
    'especialidad.string' => 'La especialidad debe ser una cadena de texto.',
    'especialidad.max' => 'La especialidad no puede superar los 100 caracteres.',

    //Fecha de alta
    'fchalt.date' => 'La fecha de alta no es válida.',
    'fchalt.before_or_equal' => 'La fecha de alta no puede ser futura.',

    //Salario
    'salario.numeric' => 'El salario debe ser un número.',
    'salario.gte' => 'El salario no puede ser inferior a 0.',
    'salario.decimal' => 'El salario debe tener como máximo 2 decimales.',
];
    public function create(): View {
        return view('profesor.create', []);
    }

    public function destroy(Profesor $profesor): RedirectResponse {
        $profesor->delete();

        return redirect()->route('profesor.index');
    }

    public function edit(Profesor $profesor): View {
        return view('profesor.edit', ['profesor' => $profesor]);
    }

    public function index(): View {
        $profesor = Profesor::all();

        return view('profesor.index', ['profesor' => $profesor]);
    }

    public function show(Profesor $profesor): View {
        return view('profesor.show', ['profesor' => $profesor]);
    }

public function store(Request $request){
    // dd($request->all());
    //1ºValidar
 $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);
 if($validator -> fails()){
    return back()->withInput() ->withErrors($validator);
}

    $profesor = new Profesor($request->all()); /*enseña todos los datos que me lleguen */
    try {
    $profesor->save();

} catch (\Illuminate\Database\UniqueConstraintViolationException $e) {
    // Error por duplicar un valor único
    return back()->withInput()->withErrors([
        'error' => 'Clave única duplicada',
       // 'nombre' => 'Este campo forma parte de la clave única',
        //'apellido' => 'Este campo también forma parte de la clave única',
        ]);

} catch (\Exception $e) {
    // Otros errores
    echo 'global';
    dd($e);
}

    /*$alumno->save();*/
    return redirect() ->route('profesor.index');
}

    public function update(Request $request, Profesor $profesor): RedirectResponse {
        $profesor->update($request->all());

        return redirect()->route('profesor.index');
    }
}










































//Inicialmente tenía esto
// namespace App\Http\Controllers;

// use App\Models\Profesor;
// use Illuminate\Http\Request;

// class ProfesorController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         //
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(Profesor $profesor)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(Profesor $profesor)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, Profesor $profesor)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(Profesor $profesor)
//     {
//         //
//     }
// }
