<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
class PostsController extends Controller
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
        $posts = Post::paginate(10);
        return view('posts/index', compact('posts'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('posts/create',compact('categorias'));
    }

    public function store(Request $request)
    {
        if ($request->file('imagen')) {
            // Se pregunta sino existe la carpeta del usuario logeado,sino existe se crea.Para despues guardarla en esa ruta
            if (!file_exists(public_path('img/'.auth()->user()->id))) {
                if (!mkdir(public_path('img/'.auth()->user()->id))) {
                    $this->errorDb("Ocurrió un error al crear la carpeta.", true);
                }
            }
            //Se instancia el objeto post y se guarda la imagen.
            $post = new Post();
            $extension = $request->file('imagen');
            $new_name    = uniqid().$extension->getClientOriginalName();
            $image = Image::make($request->file('imagen'))
            ->resize(100,100)
            ->save(public_path('img/'.auth()->user()->id. '/' .$new_name));
            $path = Storage::url('img/'.auth()->user()->id. '/' .$new_name);
            //$post->featured_image = $path;
            //Se guarda en base de datos el objeto post.Con el nombre de la imagen almacenado en la variable $new_name
            $post = Post::create([
                'id_usuario' => auth()->user()->id,
                'titulo' => $request['titulo'],
                'slug' => $request['slug'],
                'id_categoria' => $request['id_categoria'],
                'descripcion' => $request['descripcion'],
                'imagen' => $new_name,
                'created' => date('Y-m-d H:i:s'),

            ]);
        }else{
            return back()->with('status', 'Debe adjuntar una imagen');
        }
        
        return back()->with('status', 'Creado con exito');
        
        
    }

     /* Show the form for editing the specified resource.
    *
    * @param  \App\Models\Post  $post
    * @return \Illuminate\Http\Response
    */
   public function edit(Post $post)
   {    
        $categorias = Categoria::all();
        return view('posts/edit', compact('post','categorias'));
   }

   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {   
        //Se borra la imagen en la ruta storage/img/idusuario/nombreimagen y se sube la nueva imagen.
        if ($request->file('imagen')) {
            var_dump($request->file('imagen'));
            unlink(public_path('img/'.auth()->user()->id. '/' .$post->imagen));
            $extension = $request->file('imagen');
            $new_name    = uniqid().$extension->getClientOriginalName();
            $image = Image::make($request->file('imagen'))
            ->resize(100,100)
            ->save(public_path('img/'.auth()->user()->id. '/' .$new_name));
            $path = Storage::url('img/'.auth()->user()->id. '/' .$new_name);
            var_dump($post->id);
            $post = Post::where('id', $post->id)->update([
                'id_usuario' => auth()->user()->id,
                'titulo' => $request['titulo'],
                'slug' => $request['slug'],
                'id_categoria' => $request['id_categoria'],
                'descripcion' => $request['descripcion'],
                'imagen' => $new_name,
                'created' => date('Y-m-d H:i:s'),
    
            ]);
        }else{
            return back()->with('status', 'Debe adjuntar una imagen');
        }
        
        //Retornar
        return back()->with('status', 'Actualizado con exito');
    }
    //delete post
    public function destroy(Post $post)
    {   
        unlink(public_path('img/'.auth()->user()->id. '/' .$post->imagen));
        $post->delete();
        return back()->with('status', 'Eliminado con exito');
    }
}
