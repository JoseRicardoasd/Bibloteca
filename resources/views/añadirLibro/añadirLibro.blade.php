
@extends('principal')
@section('contenido')

<div class="container-fluid">
 <div class="title">
  <h1>Lista de libros</h1>
</div>

<div class="containerrr">
   <form action="{{route('añadirLibro')}}" method="GET">
  <div class="input-group rounded">
   <input type="search" class="form-control rounded" placeholder="Buscar libro" aria-label="Search" aria-describedby="search-addon" name="buscar" value="{{$buscar}}" />
    <span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
    </span>
</div>
  </form>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
Añadir libro
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h1 class="modal-title fs-5" id="exampleModalLabel">Añadir libro</h1>

<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

<form action="añadirLibro" method="post" enctype="multipart/form-data">
 @csrf

<div class="row">
<div class="col">

<label for="" class="form-label">Autor</label>
<input type="text" class="form-control" name="autor" placeholder="Autor del libro"  onkeyup="this.value=NumText(this.value)">
@error('autor')
              <small style="color:red">{{$message}}</small>
          @enderror

</div>
<div class="col">
<label for="" class="form-label">Nombre</label>
<input type="text" class="form-control" name="nombre" placeholder="Nombre libro"  onkeyup="this.value=NumText(this.value)">
@error('nombre')
              <small style="color:red">{{$message}}</small>
          @enderror
</div>
</div>


<div class="row">
<div class="col">
<label for="exampleInputEmail1" class="form-label">Editorial</label>
<input type="text" class="form-control" name="editorial" placeholder="Editorial libro" onkeyup="this.value=NumText(this.value)">
@error('editorial')
              <small style="color:red">{{$message}}</small>
          @enderror
</div>
<div class="col">
<label for="" class="form-label">Lugar publicacion</label>
<input type="text" class="form-control" name="lugarPublicacion" placeholder="Lugar publicacion" onkeyup="this.value=NumText(this.value)">
@error('lugarPublicacion')
              <small style="color:red">{{$message}}</small>
          @enderror
</div>
</div>


<div class="row">
<div class="col">
<label for="" class="form-label">Año publicacion</label>
<input type="text" class="form-control" name="añoPublicacion" placeholder="Año de publicacion" onkeyup="this.value=NumText(this.value)">
@error('añoPublicacion')
              <small style="color:red">{{$message}}</small>
          @enderror
</div>

<div class="col">
    <label for="" class="form-label">Categoria</label>
<select name="categoria" id="" class="form-select" >
    <option value="">Selecciona una opcion</option>
    @foreach ($roles as $categorias)

    <option value="{{$categorias->id}}">{{$categorias->nombre}}</option>
@endforeach
</select>
@error('categoria')
              <small style="color:red">{{$message}}</small>
          @enderror
</div>

</div>


<div class="col">
<label for="imagen" class="form-label">Imagen Libro</label>
<input type="file" class="form-control" name="imagen" >
@error('imagen')
              <small style="color:red">{{$message}}</small>
          @enderror
</div>


<div class="col">
<label for="pdf" class="form-label">PDF</label>
<input type="file" class="form-control" name="pdf" >
@error('pdf')
              <small style="color:red">{{$message}}</small>
              <script type="text/javascript">
                $(document).ready(function(){
                 $('#exampleModal').modal('show');});
             </script>

         @enderror

</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

<button type="submit" class="btn btn-primary guarda">Guardar</button>
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
<th scope="col">Autor</th>
<th scope="col">Nombre libro</th>
<th scope="col">Acciones</th>

</tr>
</thead>
<tbody>

@if (count($alumnos)<=0)
<tr>
<td>
No existe este libro
</td>
</tr>
@else

<tr>
@foreach ($alumnos as $item)
<td>{{$item->id}}</td>

<td>{{$item->autor}}</td>

<td>{{$item->ombre}}</td>
<td>



<form action="{{route('libros.delete',$item->id)}}" method="POST">

@csrf
@method('DELETE')

<button type="submit" class="btn btn-danger">Eliminar</button>
</td>
</form>
<td>

    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal2{{($item->id)}}">
        Editar
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal2{{($item->id)}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Editar libro</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{route('libros.update',$item->id)}}" method="post">
     @csrf
     @method('PUT')
              <div class="row">
                <div class="col">

                        <label for="" class="form-label">Autor</label>
                        <input type="text" class="form-control" name="autor" value="{{$item->autor}}">
                        @error('autor')
                        <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="col">
                    <label for="" class="form-label">nombre</label>
                        <input type="text" class="form-control" name="nombre" value="{{$item->ombre}}">
                        @error('nombre')
                        <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
              </div>


              <div class="row">
                <div class="col">
                    <label for="exampleInputEmail1" class="form-label"></label>
                        <input type="text" class="form-control" name="editorial" value="{{$item->editorial}}">
                        @error('editorial')
                        <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="col">
                    <label for="" class="form-label">Lugar publicacion</label>
                        <input type="text" class="form-control" name="lugarPublicacion" value="{{$item->lugarPublicacion}}">
                        @error('lugarPublicacion')
                        <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
              </div>

              <div class="row">
                <div class="col">
                    <label for="" class="form-label">Año publicacion</label>
                        <input type="text" class="form-control" name="añoPublicacion" value="{{$item->añoPublicacion}}">
                        @error('añoPublicacion')
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
 @endif
</tbody>
</table>
<div class="d-flex justify-content-end">
{{$alumnos->links()}}
</div>

</div>

</div>


@endsection

