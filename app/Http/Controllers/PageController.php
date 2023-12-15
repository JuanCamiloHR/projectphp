<?php

namespace App\Http\Controllers; // ruta de acceso al controlador, se intecta en routes

use App\Models\Post; // importado, para hacer una consulta a la tabla llamada post
use Illuminate\Http\Request; // illuminate es propia de laravel

class PageController extends Controller
{
	public function home() // petición y/o solicitud
	{
    	return view('home');
    }

    public function blog() // petición y/o solicitud. Listado de publicaciones.
    {
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

		 $posts = Post::latest()->paginate(); // consulta de datos paginada, imprime en orden descendente

		 return view('blog', ['posts' => $posts]);
    }

    public function post(Post $post) // petición y/o solicitud. Es una publicación individual
    {
    	// consulta en base de datos con el slug
	    //$post = $slug;

	    return view('post', ['post' => $post]);
    }
}