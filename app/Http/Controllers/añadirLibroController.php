<?php

namespace App\Http\Controllers;

use App\Models\añadirCategoria;
use Illuminate\Http\Request;
use App\Models\añadirLibro;
use Illuminate\Support\Facades\DB;

class añadirLibroController extends Controller
{

    public function index(Request $request)
    {

        //tra todos los datos que tiene categoria
        $roles = añadirCategoria::all();
        $buscar = $request->get('buscar');

        //trae los datos que hay en la base de datos de la tabla añadir_libros-realiza la funcion de busqueda cuando el nombre sea igual a lo tecleado
        $alumnos = DB::table('añadir_libros')->select('id','ombre','autor','editorial','lugarPublicacion','añoPublicacion')->where('ombre','LIKE','%'.$buscar.'%')->paginate(2);
        //retorna los datos en la vista añadirLibro
        return view ('añadirLibro/añadirLibro',compact('alumnos','buscar','roles'));

    }

    public function create(Request $request)
    {

        $busca = $request->get('busca');
        //selecciona los datos de la tabla añadir_libros-realiza la busqueda cuando el nombre sea igual a lo tecleado
        $vistaLibros = DB::table('añadir_libros')->select('id','ombre','autor','editorial','lugarPublicacion','añoPublicacion','imagen','pdf')->where('ombre','LIKE','%'.$busca.'%')->paginate(5);

        //retorna los datos en la vista mostrar libros
        return view ('añadirLibro/mostrarLibro',compact('vistaLibros','busca'));
    }


    public function store(Request $request)
    {
        //reglas de validacion de los formularios
        $request->validate([
            'autor' => 'required|regex:/^[\pL\s\-]+$/u',
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'editorial' => 'required|regex:/^[\pL\s\-]+$/u',
            'lugarPublicacion' => 'required|regex:/^[\pL\s\-]+$/u',
            'añoPublicacion' => 'numeric',
            'categoria' => 'required',
            'imagen' => 'required|mimes:jpg,png,jpeg',
            'pdf' => 'required|mimes:pdf',
        ]);

        //añade un nuevo libro
        $añadirLibro = new añadirLibro;
        //al momento de añadir una imagen verifica si se carga la imagen
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $desto = 'archivospdf/';
            //respeta el nombre original de la imagen-mueve la imagen a la carpeta
            $nombre = time() . '-' . $file->getClientOriginalName();
            $subida = $request->file('imagen')->move($desto,$nombre);
            $añadirLibro ->imagen = $desto . $nombre;

        }
        //comprueba si se esta añadiendo un archvio pdf-mueve el pdf a la capeta
        if($request->hasFile('pdf')){
            $file = $request->file('pdf');
            $desto = 'imagenlibro/';
            $nombre = time() . '-' . $file->getClientOriginalName();
            $subida = $request->file('pdf')->move($desto,$nombre);
            $añadirLibro ->pdf = $desto . $nombre;

        }

        //guarda la informacion que se tiene en los input con el nombre de los inputs
        $añadirLibro->autor = $request->input('autor');
        $añadirLibro->ombre = $request->input('nombre');
        $añadirLibro->editorial= $request->input('editorial');
        $añadirLibro->lugarPublicacion = $request->input('lugarPublicacion');
        $añadirLibro->añoPublicacion = $request->input('añoPublicacion');
        $añadirLibro->categoria_id = $request->input('categoria');
        $añadirLibro->save();
        return back();


    }

    //public function show($id)
    //{

       // $libro = añadirLibro::find($id);
       // return view ('show',compact('libro'));

    //}

    public function edit(añadirLibro $id)
    {
        //retorna los datos a la vista para poder utilizarlos
        return view ('añadirLibro/editar',compact('id'));
    }

    public function update(Request $request,$id)
    {

        $request->validate([
            'autor' => 'required|regex:/^[\pL\s\-]+$/u',
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'editorial' => 'required|regex:/^[\pL\s\-]+$/u',
            'lugarPublicacion' => 'required|regex:/^[\pL\s\-]+$/u',
            'añoPublicacion' => 'numeric',

        ]);
        //funcion actualizar guarda la nuevz informacion del libro-la actualiza-findOrFail($id) toma un único argumento y lo devuelve
        $libro = añadirLibro::findOrFail($id);
        $libro ->autor = $request->input('autor');
        $libro  ->ombre = $request->input('nombre');
        $libro  ->editorial= $request->input('editorial');
        $libro  ->lugarPublicacion = $request->input('lugarPublicacion');
        $libro  ->añoPublicacion = $request->input('añoPublicacion');
        $libro->save();
        return redirect()->route('libros.index');
    }


    public function destroy($id)
    {
        //funcion eliminar-elimina los datos de la tabla
        $libro = añadirLibro::find($id);
        $libro->delete();
        return back()->with('succes','Libro eliminado correctamente');
    }




}
