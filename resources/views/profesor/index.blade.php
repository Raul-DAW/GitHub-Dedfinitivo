@extends('template.base')

@section('title')
ProfesorDB
@endsection

@section('content')

<div class="container mt-4">

    <div class="mb-4 text-end">
        <a href="{{ route('profesor.create') }}" class="btn btn-secondary">
            Create profesor
        </a>
    </div>

    <h2>Listado de profesores</h2>

    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="mb-3">
                <table class="table table-hover">

                    @foreach($profesor as $profesor)

                    <tr>
                        <td>{{ $profesor->id }}</td>
                        <td>{{ $profesor->nombre }}</td>
                        <td>{{ $profesor->apellido }}</td>
                        <td>{{ $profesor->especialidad }}</td>
                        <td>{{ $profesor->fchalt }}</td>
                        <td>{{ $profesor->salario }}</td>

                        <td>
                            <a href="{{ route('profesor.show', $profesor) }}" class="btn btn-secondary">
                                View
                            </a>

                            <a href="{{ route('profesor.edit', $profesor) }}" class="btn btn-secondary">
                                Edit
                            </a>

                            <form 
                                action="{{ route('profesor.destroy', $profesor) }}" 
                                method="post"
                                class="confirm-dialog"
                                data-message="{{ $profesor->nombre }}"
                                style="display:inline">

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
            const message = '¿Seguro que quieres borrar al profesor ' + form.dataset.message + '?';

            if (!confirm(message)) {
                e.preventDefault();
            }
        });
    }
);
</script>

@endsection