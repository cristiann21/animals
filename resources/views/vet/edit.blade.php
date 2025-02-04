<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animals</title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<!--Barra de menu-->
@include('navbar')

@if (session('exito')) 
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('exito') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif


<!-- contenido (formulario de edicion del animal) -->
<form action="{{route('vet.update',$vet)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" value={{$vet->name}}>
  </div>

  <div class="form-group">
    <label for="email">email</label>
    <input type="email" class="form-control" name="email"value={{$vet->email}}>
  </div>

  <div class="form-group">
    <label for="phone">phone</label>
    <input type="phone" class="form-control" name="phone"value={{$vet->phone}}>
  </div>

  <div class="form-group">
    <label for="name">address</label>
    <input type="address" class="form-control" name="address"value={{$vet->address}}>
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>


</form>
</body>
</html>