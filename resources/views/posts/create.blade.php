<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        	{{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200"> <!--posts.store es la ruta que permite guardar infon.  -->
                    <form action="{{ route('posts.store') }}" method="POST"> <!-- método post porque se requiere alterar la BD  -->
                                                                            
			    		@include('posts._form') <!--incluir al conjunto de controles. Carpeta posts., _form (vista que funciona como parte de otra, no directamente)  -->

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!--  -->