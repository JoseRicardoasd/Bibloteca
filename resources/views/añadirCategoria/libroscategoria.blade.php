
@extends('principal')
@section('contenido')

<div class="titlelibros">
    <h1>Libros</h1>
</div>
<div class="container-fluid d-inline-flex pt-2">

@foreach ($filtrado as $Libros )




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

</div>
@endsection
