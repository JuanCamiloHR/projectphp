@extends('template')

@section('content')

<h1>{{ $post->title }}</h1>
<p>
	{{ $post->body }}  <!-- imprimir la variable que se está pasando -->
</p>
 
 @endsection

