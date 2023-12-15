<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Proyecto web</title>
</head>
<body>
	<p>  <!-- Párrafo con dos enlaces, que van a home y a blog -->
		<a href="{{ route('home') }}">Home</a>  <!-- Función de rutas. Esa ruta se encarga de que el nombre que se puso, existe" -->
		<a href="{{ route('blog') }}">Blog</a>

		<!-- para inicio de sesión. Si se está logueado, entonces que se ingrese al dash. Sino, entonces se va a inicio de sesión -->
		@auth
		<a href="{{ route('dashboard') }}">Dashboard</a>
		@else
		<a href="{{ route('login') }}">Login</a>
		@endif

	</p>

	<hr> <!-- esto es una línea -->

	@yield('content') <!-- creada esta directiva, la palabra "content" reemplaza todo lo anterior
                       para el templete y usar en cada vista que necesite -->
</body>
</html>