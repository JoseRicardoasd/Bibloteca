<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\añadirCategoria;
use App\Models\añadirLibro;

class categoriaController extends Controller
{

    public function index()
    {
        //muestra todos los datos que se enecuentren en la base de datos y los retorna en una vista
        $añadirCategoria = añadirCategoria::paginate(2);
        return view('añadirCategoria/añadirCategoria',compact('añadirCategoria'));
    }


    public function create()
    {
        //muestra los datos de la base datos y los muestra en la vista
        $vistaCategorias = añadirCategoria::paginate(3);
        return view ('añadirCategoria/mostrarCategoria',compact('vistaCategorias'));
    }


    public function store(Request $request)
    {
        //reglas de validacion
        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'descripcion' => 'required|regex:/^[\pL\s\-]+$/u',

        ]);

        //guarda los datos capturados en los inputs

        $Categoria = new añadirCategoria();
        $Categoria->nombre = $request->input('nombre');
        $Categoria->descripcion=$request->input('descripcion');
        $Categoria->save();
        return back();
    }



    public function edit($id)
    {
        //selecciona los datos del parametro
        return view ('añadirCategoria/editarCategoria',compact('id'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'descripcion' => 'required|regex:/^[\pL\s\-]+$/u',

        ]);

        //actualiza los datos de los inputs seleccionados
        $añadirLibro = añadirCategoria::findOrFail($id);
        $añadirLibro->nombre = $request->input('nombre');
        $añadirLibro->descripcion = $request->input('descripcion');
        $añadirLibro->save();
        return back();


    }


    public function destroy($id)
    {

        //elimina los datos de id seleccionado
        $eliminar = añadirCategoria::find($id);
        $eliminar->delete();
        return back()->with('succes','Libro eliminado correctamente');
    }

        //filtrado de datos para meter solo los libros que tengan una categoria igual a la categoria mostrada
    public function category(añadirCategoria $category){
        $filtrado = añadirLibro::all()->where('categoria_id',$category->id)->where('categoria_id',$category->id);

        return view('añadirCategoria/libroscategoria',compact('filtrado','category'));

    }
}
