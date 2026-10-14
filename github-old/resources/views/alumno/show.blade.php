@extends('template.base')

@section('css')
    <link href="{{ asset('assets/style/show.css') }}" rel="stylesheet" />
@endsection

@section('content')

<div class="container my-5">
    <div class="row justify-content-center g-4">

        <div class="col-12 col-md-5">
            <div class="card text-center p-4 h-100">

                <img src="{{ asset('assets/img/Chica.jpg') }}"
                     class="card-img-top mb-3"
                     alt="Alumno">

                <h4 class="card-title">
                    {{ $alumno->nombre . ' ' . $alumno->apellido }}
                </h4>

            </div>
        </div>


        <div class="col-12 col-md-5">
            <div class="card p-4 h-100">

                <h4 class="mb-4">Datos del alumno</h4>

                <p>
                    <strong>Fecha de nacimiento:</strong>
                    {{ $alumno->fnac }}
                </p>

                <p>
                    <strong>Género:</strong>
                    {{ $alumno->genero }}
                </p>

                <p>
                    <strong>Nota de acceso:</strong>
                    {{ $alumno->nacceso }}
                </p>
                

                <div class="mt-auto pt-3">
                    <a href="{{ route('alumno.index') }}" class="btn btn-secondary">
                        Back
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection