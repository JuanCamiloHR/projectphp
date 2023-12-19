<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Proyecto web</title>

	<link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
	<!-- Para la parte web (imagenes, etc). Acá se está importantdo y/o accediendo un archivo css -->

</head>
<body>
			<!-- Este div es el contenedor de toda la información para la parte de imagenes de logo y dev -->
		<div class="container px-4 mx-auto"> <!-- contenedor, relleno hacia los lados -->
		<header class="flex justify-between items-center py-4"> <!-- texto centrado -->
			<div class="flex items-center flex-grow gap-4"> <!-- relleno -->
				<a href="{{ route('home') }}">
					<img src="{{ asset('images/logo.png') }}" class="h-12"> <!-- accediendo y/o imprimiendo a la imagen guardada en la carpeta -->
				</a>
				<form action="{{ route('home') }}" class="flex-grow" method="GET"> <!-- acceso a la ruta HOME, con el método GET -->
				    <input type="text" name="search" placeholder="Buscar" value="{{ request('search') }}" 
				    class="border border-gray-200 rounded py-2 px-4 w-1/2" 
				    >
				</form>
			</div> <!-- Value=, atributo.... para recuperar (request) el parámetro y/o valor de la variable -->

		<!-- para inicio de sesión. Si se está logueado, entonces que se ingrese al dash. Sino, entonces se va a inicio de sesión -->
		@auth
			<a href="{{ route('dashboard') }}">Dashboard</a>
			@else
			<a href="{{ route('login') }}">Login</a>
			@endif
		</header>



		<!-- Para un diseño personalizado -->
		<div class="opacity-60 h-px mb-8" style="
			background: linear-gradient(to right, 
				rgba(200, 200, 200, 0) 0%,
				rgba(200, 200, 200, 1) 30%,
				rgba(200, 200, 200, 1) 70%,
				rgba(200, 200, 200, 0) 100%
			);
		">

		</div>


		   @yield('content') <!-- creada esta directiva, la palabra "content" reemplaza todo lo anterior-->
                       <!-- para el templete y usar en cada vista que necesite -->
	    

		<!-- Párrafo que incluye a "mi logo" -->			   
		<p class="py-16">
			<img src="{{ asset('images/logo.png') }}" class="h-12 mx-auto">
		</p>
	</div>
</body>
</html>