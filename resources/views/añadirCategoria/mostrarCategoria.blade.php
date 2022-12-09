@extends('principal')
@section('contenido')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categorias</title>
</head>
<body>

    <div class="title">
        <h1>Libros por Categoria</h1>
      </div>

    <div class="container-fluid d-inline-flex pt-2">
@foreach ($vistaCategorias as $item)

 <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{$item->nombre}}</h5>
          <p class="card-text">{{$item->descripcion}}</p>
          <a href="{{route('view.category',$item->id)}}"><button type="button" class="btn btn-success">Ver libros</button></a>

        </div>
      </div>
@endforeach



<div class="d-flex justify-content-end">
    {{$vistaCategorias->links()}}
    </div>

</body>
</html>

@endsection
