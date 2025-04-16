<x-layouts.app>
    <div class="my-6 w-full space-y-6">
        <h1 class="text-2xl font-bold">{{ __('EDITAR PRODUCTO') }}</h1>
        <form action="{{ route('productos.update', $producto->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Nombre') }}</label>
                <input type="text" name="nombre" id="nombre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required value="{{$producto->nombre }} ">
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Descripción') }}</label>
                <textarea name="descripcion" id="descripcion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"> {{$producto->descripcion}}</textarea>
            </div>

            <div>
                <label for="precio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Precio') }}</label>
                <input type="number" name="precio" id="precio" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required value="{{ $producto->precio }}">
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Guardar Cambios') }}</button>
            </div>
        </form>
    </div>
</x-layouts.app>