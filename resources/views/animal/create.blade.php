<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animals</title>
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
</head>
<body>
    <!-- Barra de menú -->
    @include('navbar')

    <!-- Contenido (Formulario de edición del animal) -->
    <div class="container mt-5">
        <form action="{{ route('animal.store') }}" method="post" class="p-4 border rounded shadow">
            @csrf
            @method('POST')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="weight" class="form-label">Weight (kg)</label>
                <input type="number" class="form-control" id="weight" name="weight" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="ownername" class="form-label">Owner's Name</label>
                <input type="text" class="form-control" id="ownername" name="ownername" required>
            </div>

            <div class="mb-3">
                <label for="ownerphone" class="form-label">Owner's Phone</label>
                <input type="tel" class="form-control" id="ownerphone" name="ownerphone" pattern="[0-9]{10}" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Create</button>
        </form>
    </div>
</body>
</html>
