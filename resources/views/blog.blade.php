@extends('template') <!-- creada para el templete y usar en cada vista que necesite -->

@section('content')  <!-- creada para el templete y usar en cada vista que necesite -->

<h1>Listado</h1>

	@foreach( $posts as $post )             <!-- Recorriendo la información. Le pasa la variable de la ruta. --> 
	<p>                                     <!-- creando párrafo -->
		<!-- <strong>{{ $post['id'] }}</strong> // Formato de array, son corchetes-->
		<strong>{{ $post->id }}</strong> <!-- formato de objeto propiedad -->
		<a href="{{ route('post', $post->slug) }}">    <!-- creando enlace para imprimir el títulorio -->
                                                         <!-- Función de rutas.. slug es el parámetro esperado -->
			{{ $post->title }}
			
		</a>
		<br>
	<span>{{ $post->user->name }}</span> <!-- imprimiendo el usuario -->

	</p>
	@endforeach

	{{ $posts->links() }}  <!-- para paginar en la web -->


@endsection