
@extends('principal')
@section('contenido')

<div class="titlelibros">
    <h1>Libros</h1>
</div>

<div class="containerrr">
    <form action="{{route('libros.create')}}" method="GET">
   <div class="input-group rounded">
    <input type="search" class="form-control rounded" placeholder="Buscar libro" aria-label="Search" aria-describedby="search-addon" name="busca" value="{{$busca}}" />
     <span class="input-group-text border-0" id="search-addon">
     <i class="fas fa-search"></i>
     </span>

 </div>
   </form>
 </div>
<div class="container-fluid d-inline-flex pt-2">



@foreach ($vistaLibros as $Libros )




    <div class="card m-1" style="width: 12.8rem;">
        <img src="{{asset($Libros->imagen)}}" class="card-img-top" alt="..." >
        <div class="card-body">
          <p class="card-text"><b>NOMBRE:</b>{{$Libros->ombre}}</p>
            <p>
            <b>AUTOR:</b>{{$Libros->autor}}
            </p>

           <a href="{{$Libros->pdf}}"target="_blank"><button type="button" class="btn btn-success">Ver</button></a>
        </div>
      </div>

      @endforeach

</div>
<div class="d-flex justify-content-end">
    {{$vistaLibros->links()}}
</div>
@endsection
