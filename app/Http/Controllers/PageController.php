<?php

namespace App\Http\Controllers; // ruta de acceso al controlador, se intecta en routes

use App\Models\Post; // importado, para hacer una consulta a la tabla llamada post
use Illuminate\Http\Request; // illuminate es propia de laravel

class PageController extends Controller
{
	public function home(Request $request) // petición y/o solicitud. Request es una clase
	{

		// dd($_REQUEST); // Esto es php puro. Muestra un arry vacío, pero al buscar la url y luego unirlo con ?search=xxxx, esto devuelve lo que el usuario está buscando
		// dd($request->all()); // esto es laravel, no php

		$search = $request->search;

		$posts = Post::where('title', 'LIKE', "%{$search}%")
		    ->with('user') //Mostrar al creador de la publicación cuando consulte los artículos, para probar la optimización (debug)
			->latest()->paginate();

		return view('home', compact('posts'));
    }




   // public function blog() // petición y/o solicitud. Listado de publicaciones.
    //{
    	// consulta en base de datos
	   /* $posts = [
	        ['id' => 1, 'title' => 'PHP',     'slug' => 'php'],
	        ['id' => 2, 'title' => 'Laravel', 'slug' => 'laravel']
	    ];

	    return view('blog', ['posts' => $posts]);*/

		// $posts = Post::get(); // "traeme todos los post"
        // $post = Post::first(); // para traer el primer elemento
        // $post = Post::find(25); // trae el id 25

		 // dd($post);

		// $posts = Post::latest()->paginate(); // consulta de datos paginada, imprime en orden descendente

		// return view('blog', ['posts' => $posts]);
    //}





    public function post(Post $post) // petición y/o solicitud. Es una publicación individual
    {
    	// consulta en base de datos con el slug
	    //$post = $slug;

	    return view('post', ['post' => $post]);
    }
}