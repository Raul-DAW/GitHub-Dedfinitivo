@extends('template.base')

@section('css')
    <link href="{{ asset('assets/style/show.css') }}" rel="stylesheet" />
@endsection

@section('content')

<div class="container my-5">
    <div class="row justify-content-center g-4">

        <div class="col-12 col-md-5">
            <div class="card text-center p-4 h-100">

                <img src="{{ asset('assets/img/profesor.jpg') }}"
                     class="card-img-top mb-3"
                     alt="Profesor">

                <h4 class="card-title">
                    {{ $profesor->nombre . ' ' . $profesor->apellido }}
                </h4>

            </div>
        </div>


        <div class="col-12 col-md-5">
            <div class="card p-4 h-100">

                <h4 class="mb-4">Datos del Profesor</h4>

                 <strong>Especialidad</strong>
                    {{ $profesor->especialidad }}
                </p>
                
                <p>
                    <strong>Fecha de alta:</strong>
                    {{ $profesor->fchalt }}
                </p>

                <p>
                    <strong>Salario</strong>
                    {{ $profesor->salario }}
                </p>
                

                <div class="mt-auto pt-3">
                    <a href="{{ route('profesor.index') }}" class="btn btn-secondary">
                        Back
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection