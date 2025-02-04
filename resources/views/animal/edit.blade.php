<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animals</title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<!--Barra de menu-->
@include('navbar');
<!-- contenido (formulario de edicion del animal) -->
<form action="{{route('animal.update',$animal)}}" method="post">
    @csrf
    @method('PUT')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" value={{$animal->name}}>
  </div>

  <div class="form-group">
    <label for="weight">Weight</label>
    <input type="number" class="form-control" name="weight"value={{$animal->weight}}>
  </div>

  <div class="form-group">
    <label for="name">Age</label>
    <input type="number" class="form-control" name="age"value={{$animal->age}}>
  </div>

  <div class="form-group">
    <label for="name">Description</label>
    <input type="text" class="form-control" name="description"value={{$animal->description}}>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>

</form>
</body>
</html>