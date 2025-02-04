

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vet</title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
@include('navbar')

<!-- Mostrar los posibles errores al rellenar el formulario -->
 @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
  
    {{ $error }}

    </div>
    @endforeach
    @endif
<!-- contenido (formulario de edicion del animal) -->
<form action="{{route('vet.store')}}" method="post" class="m-5">
    @csrf
    @method('POST')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" >
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email">
  </div>

  <div class="form-group">
    <label for="phone">phone</label>
    <input type="phone" class="form-control" name="phone">
  </div>

  <div class="form-group">
    <label for="address">address</label>
    <input type="text" class="form-control" name="address">
  </div>

  <button type="submit" class="btn btn-primary">Crear</button>

</form>
</body>
</html>