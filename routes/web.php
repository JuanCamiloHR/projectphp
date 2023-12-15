<?php
//use Illuminate\Http\Request; // se importó esta clase

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


/**
 * Route::get
 * Route::post
 * Route::delete
 * Route::put
 */

 /*
Route::get('/', function () {
         return view('home');
});

// Aceptan un nombre y una función para resolver el problema. blog es la ruta y retorna una vista. Se está creando una página web.
Route::get('blog', function () {
    return 'Listado de publicaciones';
});

// se maneja un parámetro slug, y la función recibe ese parámetro
Route::get('blog/{slug}', function ($slug) {
    // consulta en base de datos

    return $slug;
});


// solicitud http. Controlar lo enviado por un usuario.
Route::get('buscar', function (Request $request) {
    return $request->all(); // toda la información respecto a la solicitud y/o información
}); */



// CREANDO RUTAS QUE DEVUELVEN VISTAS. Nota: crear vista en resources
/*
Route::get('/', function () {
    return view('home');
})->name('home'); // para que funcionen los botones a cada ruta darle un nombre y a partir 
                  //de ahí construir a los enlaces->name('home')


    Route::get('blog', function () {
    // consulta en base de datos
    $posts = [
        ['id' => 1, 'title' => 'PHP',     'slug' => 'php'],
        ['id' => 2, 'title' => 'Laravel', 'slug' => 'laravel']
    ];

    return view('blog', ['posts' => $posts]);
})->name('blog');


Route::get('blog/{slug}', function ($slug) { // ruta que necesita parámetro
    // consulta en base de datos con el slug
    $post = $slug;

    return view('post', ['post' => $post]);
})->name('post');*/


// usando los controlladores. Ya la lógica no va a acá en las rutas

/** esta forma también sirve. En comillas simples va el nombre del método
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('blog', [PageController::class, 'blog'])->name('blog');
Route::get('blog/{slug}', [PageController::class, 'post'])->name('post');
*/


// creando un grupo
Route::controller(PageController::class)->group(function () {     

    Route::get('/',           'home')->name('home');        // ruta home 
    Route::get('blog',        'blog')->name('blog');       // ruta de publicaciones
    Route::get('blog/{post:slug}', 'post')->name('post'); // ruta de publicaciones de forma individual.
                                                         // el slug es una propiedad del post
});


// Para inicio de sesión, con breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';