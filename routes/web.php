<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\añadirLibroController;
use App\Http\Controllers\añadirUsuarioController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\administradorController;
use App\Http\Controllers\categoriaController;


Route::get('/register',[RegisterController::class, 'create'])->name('register.index');
Route::post('/register',[RegisterController::class, 'store'])->name('register.store');
Route::get('/login',[loginController::class,'create'])->name('login.index');
Route::post('/login',[loginController::class,'store'])->name('login.store');
Route::get('/logout',[loginController::class,'destroy'])->name('login.destroy');
Route::get('/admin',[administradorController::class,'index'])
->middleware('auth.admin')
->name('admin.index');

//ruta para añadir libros
Route::post('/añadirLibro',[añadirLibroController::class,'store'])->name('añadirLibro');
Route::get('/añadirLibro',[añadirLibroController::class,'index'])->name('libros.index');
Route::get('/añadir',[añadirLibroController::class,'create'])->name('libros.create');
Route::delete('/añadirLibro/{id}',[añadirLibroController::class,'destroy'])->name('libros.delete');
Route::get('/añadirLibro/{id}/edit',[añadirLibroController::class,'edit'])->name('libros.edit');
Route::put('/añadirLibro/{id}',[añadirLibroController::class,'update'])->name('libros.update');


//Usuarios
Route::post('/añadirUsuario',[añadirUsuarioController::class,'store'])->name('añadirUsuario');
Route::get('/añadirUsuario',[añadirUsuarioController::class,'index'])->name('usuarios.index');
Route::delete('/añadirUsuario/{id}',[añadirUsuarioController::class,'destroy'])->name('usuarios.delete');
Route::get('/añadirUsuario/{id}/edit',[añadirUsuarioController::class,'edit'])->name('usuarios.edit');
Route::put('/añadirUsuario/{id}',[añadirUsuarioController::class,'update'])->name('usuarios.update');

//Categorias
Route::post('/añadirCategoria',[categoriaController::class,'store'])->name('añadirCategoria');
Route::get('/añadirCategoria',[categoriaController::class,'index'])->name('categoria.index');
Route::get('/añadirrr',[categoriaController::class,'create'])->name('categoria.create');
Route::delete('/añadirCategoria/{id}',[categoriaController::class,'destroy'])->name('categoria.delete');
Route::get('/añadirCategoria/{id}/edit',[categoriaController::class,'edit'])->name('categoria.edit');
Route::put('/añadirCategoria/{id}',[categoriaController::class,'update'])->name('categoria.update');

//ruta de vistas
Route::view('/categorias','categorias')->name('categorias');
Route::view('/infantil','infantil')->name('infantil');
Route::view('/libroscategoria','añadirCategoria/libroscategoria')->name('libroscategoria');
Route::get('category/{category}',[categoriaController::class,'category'])->name('view.category');


