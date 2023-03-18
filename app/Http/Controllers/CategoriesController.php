<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories=Category::all(); //CRIDAS AL METODE ESTATIC PER REBRE TOTES LES tareas
        return view('categories.index',['Categories'=>$Categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //VALIDEM EL QUE HAN PASSAT PEL FORMULARI
        $request->validate([
            'name' => 'required|min:3', //REQUERIT I MINIM 3 CARACTERS
            'color' => 'required|min:3' //REQUERIT I MINIM 3 CARACTERS
        ]);
        //EMPLENEM LOBJECTE AMB ELS DADES DEL FORMULARI
        $Category=new Category(); 
        $Category->name=$request->name;
        $Category->color=$request->color;
        $Category->save();
        //REDIRIGIM
        return redirect()->route('categories.index')->with('Success', 'Categoria creada correctamente');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::find($id); //CRIDAS AL METODE ESTATIC PER REBRE TOTES LES tareas
        return view('categories.show',['category'=>$category]);
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $category=Category::find($category); //id obtinguda de la url
        $category->name=$request->name;
        $category->color=$request->color;
        $category->save();

        //return view('todos.index',['succes'=>'Tarea Actualizadas']); si fessim aixo tindriem que passar de nou la arrray amb tots els todos ($todos=Todo::all();)
        return redirect()->route('categories.index')->with('success','Categoria Actualizadas');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function destroy($category)
     {
         //
         $category = Category::find($category);
         $category->todos()->each(function($todo) {
             $todo->delete(); // ELIMINA TOTS ELS TODOS QUE PERTANYEN A LA CATEGORIA QUE VOLEM ELIMINAR
          });
         $category->delete();
         return redirect()->route('categories.index')->with('success', 'Categoria Eliminada');
     }
}
