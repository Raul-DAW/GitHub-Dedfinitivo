@extends('template.base')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h2 class="mb-4">Editar Alumno</h2>

            <form action="{{ route('alumno.update', $alumno) }}" method="post">
                @method('put')
                @csrf /*Medida de seguridad que se usa con todas las rutas que no sean */

                {{-- Nombre --}}
                <div class="mb-3">
                    <label for="nombre" class="form-label">
                        Nombre:
                    </label>

                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        class="form-control"
                        maxlength="100"
                        placeholder="Introduce el nombre del alumno"
                        value="{{ $alumno->nombre }}"
                        required>
                </div>

                {{-- Apellidos --}}
                <div class="mb-3">
                    <label for="apellido" class="form-label">
                        Apellidos:
                    </label>

                    <input
                        type="text"
                        id="apellido"
                        name="apellido"
                        class="form-control"
                        maxlength="130"
                        placeholder="Introduce los apellidos del alumno"
                        value="{{ $alumno->apellido }}"
                        required>
                </div>

                {{-- Fecha de nacimiento --}}
                <div class="mb-3">
                    <label for="fnac" class="form-label">
                        Fecha de nacimiento:
                    </label>

                    <input
                        type="date"
                        id="fnac"
                        name="fnac"
                        class="form-control"
                        value="{{ $alumno->fnac }}">
                </div>

                {{-- Género --}}
                <div class="mb-3">
                    <label for="genero" class="form-label">
                        Género:
                    </label>

                    <select
    id="genero"
    name="genero"
    class="form-select">

    <option value="" {{ $alumno->genero == '' ? 'selected' : '' }}>
        No especificado
    </option>

    <option value="masculino" {{ $alumno->genero == 'masculino' ? 'selected' : '' }}>
        Masculino
    </option>

    <option value="femenino" {{ $alumno->genero == 'femenino' ? 'selected' : '' }}>
        Femenino
    </option>

    <option value="otro" {{ $alumno->genero == 'otro' ? 'selected' : '' }}>
        Otro
    </option>

</select>
                </div>

                {{-- Nota de acceso --}}
                <div class="mb-3">
                    <label for="nacceso" class="form-label">
                        Nota de acceso:
                    </label>

                    <input
                        type="number"
                        id="nacceso"
                        name="nacceso"
                        class="form-control"
                        min="0"
                        max="10"
                        step="0.01"
                        placeholder="Introduce la nota de acceso"
                        value="{{ $alumno->nacceso }}">
                </div>

                {{-- Botón --}}
                <button type="submit" class="btn btn-primary">
                    Edit puppil
                </button>

                <a href="{{ route('alumno.index') }}" class="btn btn-secondary">
                         Back
                        </a>

            </form>

        </div>
    </div>
</div>

@endsection