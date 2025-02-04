<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Barra de menú -->
@include('navbar')

<div class="container mt-4">
    <!-- Mensaje de éxito -->
    @if (session('exito')) 
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('exito') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2 class="mb-4">Lista de Animales</h2>
    
    <!-- Tabla de Animales -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Peso (kg)</th>
                    <th>Edad (años)</th>
                    <th>Descripción</th>
                    <th>Dueño</th>
                    <th>Veterinario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($animals as $animal)
                <tr>
                    <td>{{ $animal->name }}</td>
                    <td>{{ $animal->weight }}</td>
                    <td>{{ $animal->age }}</td>
                    <td>{{ $animal->description }}</td>
                    <td>{{ $animal->owner->name ?? 'Sin dueño' }}</td>
                    <td>{{ $animal->vet->name ?? 'Sin veterinario' }}</td>
                    <td>
                        <a href="{{ route('animal.edit', $animal->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <a href="{{ route('animal.show', $animal->id) }}" class="btn btn-success btn-sm">Ver</a>
                        <form action="{{ route('animal.destroy', $animal->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
