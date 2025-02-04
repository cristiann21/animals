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
<!--Barra de menu-->
@include('navbar');
<!-- contenido (formulario de edicion del animal) -->
<form action="{{route('vet.index')}}" method="post">
    @csrf
    @method('GET')
    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" value={{$vet->name}} disabled>
  </div>

  <div class="form-group">
    <label for="email">email</label>
    <input type="email" class="form-control" name="email"value={{$vet->email}} disabled>
  </div>

  <div class="form-group">
    <label for="phone">phone</label>
    <input type="phone" class="form-control" name="phone"value={{$vet->phone}} disabled>
  </div>

  <div class="form-group">
    <label for="address">address</label>
    <input type="address" class="form-control" name="address"value={{$vet->address}} disabled>
  </div>

  <button type="submit" class="btn btn-primary">Return</button>

</form>
</body>
</html>