<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;
use App\Http\Controllers\TodosController;

class TodosController extends Controller
{

    public function store(Request $request){
        //VALIDEM EL QUE HAN PASSAT PEL FORMULARI
        $request->validate([
            'tittle' => 'required|min:3' //REQUERIT I MINIM 3 CARACTERS
        ]);
        //EMPLENEM LOBJECTE AMB ELS DADES DEL FORMULARI
        $todo=new Todo(); 
        $todo->tittle=$request->tittle;
        $todo->category_id=$request->category_id;
        $todo->save();
        //REDIRIGIM
        return redirect()->route('todos')->with('Success', 'Tarea creada correctamente');
    }

    public function index(){
        $todos=Todo::all(); //CRIDAS AL METODE ESTATIC PER REBRE TOTES LES tareas
        $categories = Category::all();
        return view('todos.index',['todos'=>$todos, 'categories' => $categories]);
    }

    public function show($id){
        $todo=Todo::find($id); //CRIDAS AL METODE ESTATIC PER REBRE TOTES LES tareas
        $categories = Category::all();
        return view('todos.show',['todo'=>$todo,'categories' => $categories]);
    }

    public function update(Request $request,$id){
        $todo=Todo::find($id); //id obtinguda de la url
        $todo->tittle=$request->tittle;
        $todo->category_id=$request->category_id;
        $todo->save();

        //return view('todos.index',['succes'=>'Tarea Actualizadas']); si fessim aixo tindriem que passar de nou la arrray amb tots els todos ($todos=Todo::all();)
        return redirect()->route('todos')->with('success','Tarea Actualizadas');
    }

    public function delete($id){
        $todo=Todo::find($id); //id obtinguda de la url
        $todo->delete();

        return redirect()->route('todos')->with('success','Tarea Eliminada');
    }
}
