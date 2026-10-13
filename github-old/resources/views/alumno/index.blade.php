@extends('template.base')

@section('content')
<h2>Listado de alumnos</h2>
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="mb-3">
                <table class="table table-hover">
                    @foreach($alumno as $alumno)
                    <tr>
                    <td>{{ $alumno->id }}</td>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->apellido }}</td>
                    <td>{{ \Carbon\Carbon::parse($alumno->created_at)->format('d/m/Y') }}</td>
                    <td>{{ $alumno->fnac }}</td>
                    <td>{{ $alumno->genero }}</td>
                    <td>{{ $alumno->nacceso }}</td>
                    <td>
                       <a href="{{ route('alumno.show', $alumno) }} " class="btn btn-secondary">View</a>
                        <a href="{{ route('index') }} " class="btn btn-secondary">Edit</a>
                        <a href="{{ route('index') }} " class="btn btn-secondary">Delete</a>

                    </td>
                    @endforeach
                    <table>
         </div>
       </div>
     </div>
</div>         
@endsection