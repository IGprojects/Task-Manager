<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\CategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//::get ELS DOS PUNTS SIGNIFIQUEN QUE ESTAN CRIDANT UN METODE STATIC JA QUE SINO SERIA ->

//INSERT Y SELECT DE LES TAREAS
Route::get('/',[TodosController::class,'index'])->name('todos');
Route::get('/tareas',[TodosController::class,'index'])->name('todos');
Route::post('/tareas',[TodosController::class,'store'])->name('todos');

//UPDATE Y SELECT DEL FORMULARI PER EDITAR LES TAREAS
Route::get('/tareas/{id}',[TodosController::class,'show'])->name('todos-show');
Route::patch('/tareas/{id}',[TodosController::class,'update'])->name('todos-edit');

//DELETE LA TAREA
Route::delete('/tareas/{id}',[TodosController::class,'delete'])->name('todos-destroy');

Route::resource('/categories',CategoriesController::class);