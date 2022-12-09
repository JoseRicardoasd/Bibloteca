@extends('home')
@section('title', 'Login')

@section('container')
<div class="formulario">
    <h2>Iniciar Sesión</h2>


    <form class="mt-4" method="POST" action="">
        @csrf
    <div class="username">
        <input type="email" placeholder="Correo Electrónico" id="email" name="email">
    </div>

    <div class="username">
        <input type="password" placeholder="Contraseña" id="password" name="password">
    </div>


        <button type="submit"  class="boton">
            Iniciar
        </button>
        @error('message')
        <p class="mensaje de error msj">*{{$message}}</p>
    @enderror

        <a class="IR" href="/register">Crear cuenta</a>
    </form>

</div>
@endsection
