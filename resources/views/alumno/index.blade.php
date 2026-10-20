@extends('template.base')

@section('content')

<div class="container mt-4">

    <div class="mb-4 text-end">
        <a href="{{ route('alumno.create') }}" class="btn btn-secondary">
            Create pupil
        </a>
    </div>

    <h2>Listado de alumnos</h2>

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

                      
<td class="text-nowrap">
    <div class="d-flex align-items-center justify-content-center gap-2">

        <a href="{{ route('alumno.show', $alumno) }}"
           class="btn btn-secondary btn-sm">
            View
        </a>

        <a href="{{ route('alumno.edit', $alumno) }}"
           class="btn btn-secondary btn-sm">
            Edit
        </a>

        <form
            data-message="{{ $alumno->apellido . ', ' . $alumno->nombre }}"
            class="confirm-dialog m-0"
            action="{{ route('alumno.destroy', $alumno) }}"
            method="POST"
        >
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-secondary btn-sm">
                Delete
            </button>
        </form>

    </div>
</td>
                    </tr>

                    @endforeach

                </table>
            </div>
        </div>
    </div>

</div>

@endsection

@section('script')

<script>
document.querySelectorAll('form.confirm-dialog').forEach(
    form => {
        form.addEventListener('submit', e => {
            const message = '¿Seguro que quieres borrar al alumno ' + form.dataset.message + '?';

            if (!confirm(message)) {
                e.preventDefault();
            }
        });
    }
);
</script>

@endsection