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

                        <td>
                            <a href="{{ route('alumno.show', $alumno) }}" class="btn btn-secondary">View</a>

                            <a href="{{ route('alumno.edit', $alumno) }}" class="btn btn-secondary">Edit</a>

                            <!-- <a href="{{ route('index') }}" class="btn btn-secondary">Delete</a> -->

                            <form
                                data-message="{{ $alumno->apellido . ', ' . $alumno->nombre }}"
                                class="confirm-dialog"
                                action="{{ route('alumno.destroy', $alumno) }}"
                                method="post"
                                style="display: inline">

                                @csrf
                                @method('delete')

                                <input type="submit" value="Delete" class="btn btn-secondary">
                            </form>
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