<?php

namespace App\Http\Controllers;

use App\Models\Post; // importando el modelo
use Illuminate\Http\Request;
use Illuminate\Support\Str; // se importó esta clase para poner a trabaja la función STORE

class PostController extends Controller
{
    
    public function index() 
    {
        //return view('posts.index'); // retornando una vista (index.blade.php)
        return view('posts.index', [
            'posts' => Post::latest()->paginate() // desarrollando la consulta, de forma descendente, y método de paginación
        ]);
    }

    // Método para formulario de "crear"
    public function create(Post $post) 
    {
        return view('posts.create', ['post' => $post]);
    }

    //Función para guardar un nuevo elemento creado. Crea finalmente.
    public function store(Request $request) 
    {
        //Validaciones
        $request->validate([
    		'title' => 'required',
            'slug'  => 'required|unique:posts,slug',
    		'body'  => 'required',
    	]);

        $post = $request->user()->posts()->create([
            'title' => $request->title,
            'slug'  => $request->slug,
            'body'  => $request->body,
        ]);

        return redirect()->route('posts.edit', $post); // guarda y luego redirige a la ruta de edición
    }


    //Formulario de edición
    public function edit(Post $post) 
    {
        return view('posts.edit', ['post' => $post]);  // requiere de un registro que queremos edidat
    } // se deben crear las vistas

    // editar, finalmente.
    public function update(Request $request, Post $post)
    {
            //Validaciones
            $request->validate([
                'title' => 'required',
                'slug'  => 'required|unique:posts,slug,' . $post->id, //que sea único en la tabla post, especificamente el campo de la url amigable. $post->id para que haga la validación, pero que ignore mi propio registro, porque soy yo mismo.
    		    'body'  => 'required',
            ]);

        $post->update([
            'title' => $request->title,
            'slug'  => $request->slug,
            'body'  => $request->body,
        ]);

        return redirect()->route('posts.edit', $post);
    }

    //Función para eliminar
    public function destroy(Post $post) // recibe un post
    {
        $post->delete(); // quiero que el post sea eliminado

        return back(); // retorne a la vista anterior
    }
}
 