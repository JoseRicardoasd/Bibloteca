<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class loginController extends Controller
{
    public function create(){
        return view('login');
    }

    public function store(){

        if(auth()->attempt(request(['email','password'])) == false){
            return back()->withErrors([
                'message' => 'Correo electrónico o contraseña es incorrecto, inténtalo de nuevo',]);
        } else {
            if(auth()->user()->role == 'admin')
            {
                return redirect()->route('admin.index');
        }
            else{
                return redirect()->route('libros.create');
            }
        }
    }

    public function destroy(){
        auth()->logout();
        return redirect()->to('/login');
    }
}
