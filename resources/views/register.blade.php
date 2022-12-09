@extends('home')
@section('Register')

@section('container')

<div  class="formulario">
    <h2>Registrarte</h2>
    <form class="mt-4" method="POST" action="">
        @csrf

        <div class="username">
        <input type="text" placeholder="Nombre de usuario" id="name" name="name" onkeyup="this.value=NumText(this.value)">
        @error('name')
        <p class="mensaje de error msj">*{{$message}}</p>
        @enderror
        </div>

        <div class="username">
        <input type="email" placeholder="Correo Electrónico" id="email" name="email" onkeyup="this.value=NumText(this.value)">
        @error('email')
        <p class="mensaje de error msj">*{{$message}}</p>
        @enderror
        </div>

        <div class="username">
        <input type="password" placeholder="Contraseña" id="password" name="password" onkeyup="this.value=NumText(this.value)">
        @error('password')
        <p class="mensaje de error msj">*{{$message}}</p>
        @enderror
        </div>

        <div class="username">
        <input type="password" placeholder="Confirmar contraseña" id="password_confirmation" name="password_confirmation" onkeyup="this.value=NumText(this.value)">
        </div>


        <button type="submit" class="boton">
            Registrarte
        </button>

        <a class="IR" href="/login">Iniciar Sesión</a>
    </form>

</div>
<script>
    function NumText(string){//solo letras y numeros
    var out = '';
    //Se añaden las letras validas
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890@.';//Caracteres validos

    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1)
	     out += string.charAt(i);
    return out;
}
</script>
@endsection


