
@extends('principal')
@section('contenido')


<div class="container-fluid">
 <div class="title">
  <h1>Lista de libros por categoria</h1>
</div>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
Añadir categoria
</button>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h1 class="modal-title fs-5" id="exampleModalLabel">Añadir categoria</h1>

<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

<form action="añadirCategoria" method="post" >
 @csrf

<div class="row">
<div class="col">

<label for="" class="form-label">Nombre</label>
<input type="text" class="form-control" name="nombre" placeholder="Nombre de la categoria" onkeyup="this.value=NumText(this.value)">

@error('nombre')
              <small style="color:red">{{$message}}</small>
          @enderror
</div>

</div>
<div class="row">

    <div class="col">
      <label for="" class="form-label">Descripcion</label>
          <textarea class="form-control" name="descripcion" placeholder="Descripcion del libro" ></textarea>
          @error('descripcion')
              <small style="color:red">{{$message}}</small>
              <script type="text/javascript">
                $(document).ready(function(){
                 $('#exampleModal').modal('show');});
             </script>
          @enderror
  </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
<button type="submit" class="btn btn-primary">Guardar</button>
</div>
</form>
</div>
</div>
</div>


<div class="container-fluid">

<table class="table">

<thead>
<tr>
<th scope="col">Id</th>
<th scope="col">Categoria</th>
<th scope="col">Descripcion</th>
<th scope="col">Acciones</th>
</tr>
</thead>
<tbody>
<tr>
@foreach ($añadirCategoria as $item)
<td>{{$item->id}}</td>
<td>{{$item->nombre}}</td>
<td>{{$item->descripcion}}</td>

<td>
<form action="{{route('categoria.delete',$item->id)}}" method="POST">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Eliminar</button>
</td>
</form>


<td>
    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal3{{($item->id)}}">
        Editar
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal3{{($item->id)}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Editar libro</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{route('categoria.update',$item->id)}}" method="post">
     @csrf
     @method('PUT')
              <div class="row">
                <div class="col">

                        <label for="" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="{{$item->nombre}}">
                        @error('nombre')
              <small style="color:red">{{$message}}</small>
          @enderror
                </div>
                <div class="col">
                    <label for="" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" name="descripcion" value="{{$item->descripcion}}">
                        @error('descripcion')
              <small style="color:red">{{$message}}</small>

              <!-- Esto es lo que hace que cuando no ingreses datos y te mande msj de errores el modal permanezca -->

          @enderror
                </div>
              </div>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>


          </div>
        </div>
      </div>


</td>
</tr>

 @endforeach

</tbody>
</table>
<div class="d-flex justify-content-end">
    {{$añadirCategoria->links()}}
</div>

</div>

</div>


@endsection
