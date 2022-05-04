<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UsuariosController extends Controller
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
        $usuarios = User::paginate(10);
        return view('usuarios/index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios/create');
    }

    public function store(Request $request)
    {
        
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'created' => date('Y-m-d H:i:s'),

        ]);
        return back()->with('status', 'Creado con exito');
      
    }

    /* Show the form for editing the specified resource.
    *
    * @param  \App\Models\User  $User
    * @return \Illuminate\Http\Response
    */
   public function edit(User $usuario)
   {
       return view('usuarios/edit', compact('usuario'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $usuario->update($request->all());
       
        //Retornar
        return back()->with('status', 'Actualizado con exito');
    }

     //delete usuario
     public function destroy(User $usuario)
     {   
        $usuario->posts()->delete();
        $usuario->delete();
        return back()->with('status', 'Eliminado con exito');
     }
}
