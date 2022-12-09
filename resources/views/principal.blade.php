
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
        <link rel="stylesheet" href="{{asset('css/estilos.css')}}">

        <title>MiBiblioteca</title>
    </head>
    <body>

        <div class="main-container d-flex">
            <div class="sidebar" id="side_nav">
                <div class="logo">
                    <img src="{{asset('img/logo.png')}}" alt="" >

                </div>

                <ul class="list-unstyled px-2">
                    <li class="px-3"><a href="{{route('libros.create')}}" class="text-decoration-none px-3 py-2 d-block">Catalogo de libros</a></li>
                </ul>

                <ul class="list-unstyled px-2">
                    <li class="px-3"><a href="{{route('categoria.create')}}" class="text-decoration-none px-3 py-2 d-block">Categorias</a></li>
                </ul>


                @can('admin.añadirlibro.index')

                <ul class="list-unstyled px-2">
                    <li class="px-3"><a href="{{route('añadirLibro')}}" class="text-decoration-none px-3 py-2 d-block">Añadir libro</a></li>
                </ul>
    @endcan

@can('admin.añadirlibro.index')
<ul class="list-unstyled px-2">
    <li class="px-3"><a href="{{route('añadirCategoria')}}" class="text-decoration-none px-3 py-2 d-block">Añadir categorias</a></li>
</ul>
@endcan

    @can('admin.añadirusuario.index')

                <ul class="list-unstyled px-2">
                    <li class="px-3"><a href="{{route('añadirUsuario')}}" class="text-decoration-none px-3 py-2 d-block">Usuarios</a></li>
                </ul>
    @endcan


                <ul class="list-unstyled px-2">
                    @if (auth()->check())
                    <li class="px-3">
                        <a href="{{route('login.destroy')}}"class="text-decoration-none px-3 py-2 d-block">Cerrar Sesión</a></li>
                    </li>
                    @else
                    @yield('login-register')
                    @endif

                </ul>


            </div>

            <div class="content">

            </div>



            <div class="container">

                @yield('contenido')
                    </div>






    </body>

</html>
