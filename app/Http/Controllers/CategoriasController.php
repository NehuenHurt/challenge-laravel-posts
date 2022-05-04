<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $categorias = Categoria::where('id_padre', '=', 0)->get();
        return view('categorias/index',compact('categorias'));
    }

    public function create()
    {   
        $allCategorias = Categoria::all();
        return view('categorias/create',compact('allCategorias'));
    }

    function store(Request $request)
    {
        $input = $request->all();
        Categoria::create([
            'nombre' => $request['nombre'],
            'id_padre' => empty($input['id_padre']) ? 0 : $input['id_padre'],
            'created' => date('Y-m-d H:i:s'),

        ]);
        return back()->with('status', 'Creado con exito');    
    }

    /* Show the form for editing the specified resource.
    *
    * @param  \App\Models\Categoria
    * @return \Illuminate\Http\Response
    */
   public function edit(Categoria $categoria)
   {    
        return view('categorias/edit', compact('categoria'));
   }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $Categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update($request->all());
       
        //Retornar
        return back()->with('status', 'Actualizado con exito');
    }
    //delete categoria
    public function destroy(Categoria $categoria)
    {  
        $categoria->posts()->delete();
        $categoria->children()->delete();
        $categoria->delete();
        return back()->with('status', 'Eliminado con exito');
    }
}
