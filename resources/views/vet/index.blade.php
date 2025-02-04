<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinarios</title>
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

    <h2 class="mb-4">Lista de Veterinarios</h2>
    
    <!-- Tabla de Veterinarios -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vets as $vet)
                <tr>
                    <td>{{ $vet->name }}</td>
                    <td>{{ $vet->email }}</td>
                    <td>{{ $vet->phone }}</td>
                    <td>{{ $vet->address }}</td>
                    <td>
                        <a href="{{ route('vet.edit', $vet->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <a href="{{ route('vet.show', $vet->id) }}" class="btn btn-success btn-sm">Ver</a>
                        <form action="{{ route('vet.destroy', $vet->id) }}" method="post" class="d-inline">
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
