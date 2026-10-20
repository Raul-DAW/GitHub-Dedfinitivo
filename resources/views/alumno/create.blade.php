@extends('template.base')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">



            <h2 class="mb-4">Crear alumno</h2>
                

            <form action="{{ route('alumno.store') }}" method="post" novalidate> {{-- novalidate --}}
               @csrf {{-- Medida de seguridad que se usa con todas las rutas que no sean GET --}}
                {{-- Nombre --}}
                <div class="mb-3">
                    <label for="nombre" class="form-label">
                        Nombre:
                    </label>

                    <input
                        type="text"
                        value="{{ old('nombre') }}"
                        id="nombre"
                        name="nombre"
                        class="form-control"
                        maxlength="100"
                        placeholder="Introduce el nombre del alumno"
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
                        value="{{ old('apellido') }}"
                        id="apellido"
                        name="apellido"
                        class="form-control"
                        maxlength="130"
                        placeholder="Introduce los apellidos del alumno"
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
                        value="{{ old('fnac') }}"
                        id="fnac"
                        name="fnac"
                        max="{{ now()->format('Y-m-d') }}" {{--novalidate--}}
                        class="form-control">
                </div>
                {{--novalidate--}}
    @error('fnac')
            <div class="alert alert-danger" role="alert"> {{ $message }}</div>
             @enderror
             {{-- Género --}}

<div class="mb-3">

    <label for="genero" class="form-label">
        Género:
    </label>

    {{-- required comentado porque genero es nullable --}}

    <select
        id="genero"
        name="genero"
        class="form-select"
    >

        <option value="" @selected(old('genero', '') == '')>
            Selecciona un género
        </option>

        <option value="masculino" @selected(old('genero') == 'masculino')>
            Masculino
        </option>

        <option value="femenino" @selected(old('genero') == 'femenino')>
            Femenino
        </option>

        <option value="otro" @selected(old('genero') == 'otro')>
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
        value="{{ old('nacceso') }}"
        min="0"
        max="10"
        step="0.01"
        placeholder="Introduce la nota de acceso">
</div>
  @error('nacceso')
            <div class="alert alert-danger" role="alert"> {{ $message }}</div>
             @enderror

                {{-- Botón --}}
                <button type="submit" class="btn btn-primary">
                    Crear alumno
                </button>

            </form>

        </div>
    </div>
</div>

@endsection