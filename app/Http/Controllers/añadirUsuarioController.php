<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
class añadirUsuarioController extends Controller
{


    public function index()
    {
        //selecciona todos los datos de la tabla User y los retorna a la vista añadir usuarios
        $usuarios = User::all();
        $roles = Role::all();

        return view('añadirUsuario/añadirUsuario',compact('usuarios','roles'));
    }


    public function edit(User $id)
    {
        //selecciona el usuario con su id

    }


    public function update(Request $request, User $id)

    {
        $request->validate([
            'nombreuser' => 'required|regex:/^[\pL\s\-]+$/u',
            'correo' => 'required|email|',
            'roles'=>'required'

        ]);
        //actualiza los datos y le asigna el rol
        $id ->name = $request->input('nombreuser');
        $id  ->email = $request->input('correo');
        $id->roles()->sync($request->roles);
        $id->save();
        return redirect()->route('usuarios.index');
    }

    public function destroy($id)
    {

        //elimina los datos seleccionados
        $eliminar = User::find($id);
        $eliminar->delete();
        return back()->with('succes','Libro eliminado correctamente');
    }


}
