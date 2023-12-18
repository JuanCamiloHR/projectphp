<!-- para ver esto en el navegador se debe actualizar la vista index --> 
<!-- archivo que contiene a los controles del formulario -->

@csrf <!-- siempre se pone por seguridad, y para que laravel sepa que es generado por él mismo  -->

<label class="uppercase text-gray-700 text-xs">Nombre</label> <!-- texto en mayúscula, gris y pequeño.. en el título -->
<span class="text-xs text-red-600">@error('title') {{ $message }} @enderror</span> <!-- configuración para validaciones. Si existe error respecto al título, entonces imprimirlo  -->

<input type="text" name="title" class="rounded border-gray-200 w-full mb-4"  
	value="{{ old('title', $post->title) }}"
>

<!-- Bloque para evitar duplicados  -->
<label class="uppercase text-gray-700 text-xs">Slug</label>
<span class="text-xs text-red-600">@error('slug') {{ $message }} @enderror</span>

<input type="text" name="slug" class="rounded border-gray-200 w-full mb-4"  
	value="{{ old('slug', $post->slug) }}"
>



<label class="uppercase text-gray-700 text-xs">Contenido</label>

<span class="text-xs text-red-600">@error('body') {{ $message }} @enderror</span>

<textarea name="body" class="rounded border-gray-200 w-full mb-4" rows="5">{{ old('body', $post->body) }}</textarea>

<div class="flex justify-between items-center">
    <a href="{{ route('posts.index') }}" class="text-indigo-600">Volver</a> <!-- fluir entre las ventanas, que deje volver a la anterior  -->

    <input type="submit" value="Enviar" class="bg-gray-800 text-white rounded px-4 py-2">
</div>

<!--   -->