@extends('home')
@section('Register')

@section('container')

<div  class="formulario">
    <h2>Registrarte</h2>
    <form class="mt-4" method="POST" action="">
        @csrf

        <div class="username">
        <input type="text" placeholder="Nombre de usuario" id="name" name="name">
        @error('name')
        <p class="mensaje de error msj">*{{$message}}</p>
        @enderror
        </div>

        <div class="username">
        <input type="email" placeholder="Correo Electrónico" id="email" name="email">
        @error('email')
        <p class="mensaje de error msj">*{{$message}}</p>
        @enderror
        </div>

        <div class="username">
        <input type="password" placeholder="Contraseña" id="password" name="password">
        @error('password')
        <p class="mensaje de error msj">*{{$message}}</p>
        @enderror
        </div>

        <div class="username">
        <input type="password" placeholder="Confirmar contraseña" id="password_confirmation" name="password_confirmation">
        </div>


        <button type="submit" class="boton">
            Registrarte
        </button>

        <a class="IR" href="/login">Iniciar Sesión</a>
    </form>

</div>
@endsection

