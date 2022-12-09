
@extends('principal')
@section('contenido')


<div class="container-fluid">

    <div class="title">
        <h1>Lista de usuarios</h1>
    </div>


  <div class="container-fluid">

    <table class="table">

        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>

            <th scope="col">Acciones</th>



          </tr>
        </thead>
        <tbody>
          <tr>
    @foreach ($usuarios as $item)

    <td>{{$item->id}}</td>
    <td>{{$item->name}}</td>
    <td>{{$item->email}}</td>

    <td>


        <form action="{{route('usuarios.delete',$item->id)}}" method="POST">

@csrf
@method('DELETE')

<button type="submit" class="btn btn-danger">Eliminar</button>
</td>
 </form>
<td>


  <div class="container-fluid">


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal2{{($item->id)}}">
        Editar rol
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal2{{($item->id)}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Editar rol</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{route('usuarios.update',$item->id)}}" method="post">
     @csrf
     @method('PUT')

     <div class="row">
      <div class="col">

        <label for="" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombreuser" value="{{$item->name}}">

@error('nombreuser')
<small style="color:red">{{$message}}</small>
@enderror
      </div>
      <div class="col">
        <label for="" class="form-label">Correo</label>
        <input type="text" class="form-control" name="correo" value="{{$item->email}}">

@error('correo')
<small style="color:red">{{$message}}</small>
@enderror
      </div>
    </div>
    <br>
     <div class="row">

        <div class="col">
            <select name="roles" class="form-select" >
              <option value="">Selecciona una opcion</option>
                @foreach ($roles as $role)

                <option value="{{$role->id}}">{{$role->name}}</option>
       @endforeach
              </select>

@error('roles')
<small style="color:red">{{$message}}</small>
@enderror

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





    </div>




    </td>
    </tr>

 @endforeach
        </tbody>
      </table>


</div>

</div>






  @endsection
