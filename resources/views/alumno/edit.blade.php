@extends('template.base')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h2 class="mb-4">Editar Alumno</h2>

            <form action="{{ route('alumno.update', $alumno) }}" method="post" novalidate>
                @method('put')
                @csrf {{-- Medida de seguridad que se usa con todas las rutas que no sean GET --}}

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
                        value="{{ old('nombre', $alumno->nombre) }}"
                        required>
                </div>
                     @error('nombre')
            <div class="alert alert-danger" role="alert"> {{ $message }}</div>
             @enderror

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
                         value="{{ old('apellido', $alumno->apellido) }}"
                        required>
                </div>

                  @error('apellido')
            <div class="alert alert-danger" role="alert"> {{ $message }}</div>
             @enderror

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
                        max="{{ now()->format('Y-m-d') }}" {{--novalidate--}}
                         value="{{ old('fnac', $alumno->fnac) }}" >
                </div>

                @error('fnac')
            <div class="alert alert-danger" role="alert"> {{ $message }}</div>
             @enderror

               {{-- Género --}}
                <div class="mb-3">

                    <label for="genero" class="form-label">
                        Género:
                    </label>

                    <select
                        id="genero"
                        name="genero"
                        class="form-select">

                        <option value="" {{ old('genero', $alumno->genero) == '' ? 'selected' : '' }}>
                            No especificado
                        </option>

                        <option value="masculino" {{ old('genero', $alumno->genero) == 'masculino' ? 'selected' : '' }}>
                            Masculino
                        </option>

                        <option value="femenino" {{ old('genero', $alumno->genero) == 'femenino' ? 'selected' : '' }}>
                            Femenino
                        </option>

                        <option value="otro" {{ old('genero', $alumno->genero) == 'otro' ? 'selected' : '' }}>
                            Otro
                        </option>

                    </select>

                </div>

                @error('genero')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror

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
                         value="{{ old('nacceso', $alumno->nacceso) }}">
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
  @error('nacceso')
            <div class="alert alert-danger" role="alert"> {{ $message }}</div>
             @enderror

@endsection