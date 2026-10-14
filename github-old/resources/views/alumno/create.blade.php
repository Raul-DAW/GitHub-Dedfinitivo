@extends('template.base')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h2 class="mb-4">Crear alumno</h2>

            <form action="{{ route('alumno.store') }}" method="post">
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
                        class="form-control">
                </div>

                {{-- Género --}}
                <div class="mb-3">
                    <label for="genero" class="form-label">
                        Género:
                    </label>

                  <select
    id="genero"
    name="genero"
    class="form-select"
    required>

    <option value="">Selecciona un género</option>
    <option value="masculino">Masculino</option>
    <option value="femenino">Femenino</option>
    <option value="otro">Otro</option>

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
                        placeholder="Introduce la nota de acceso">
                </div>

                {{-- Botón --}}
                <button type="submit" class="btn btn-primary">
                    Crear alumno
                </button>

            </form>

        </div>
    </div>
</div>

@endsection