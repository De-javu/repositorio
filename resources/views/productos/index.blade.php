<x-layouts.app>


    <div class="my-6 w-full space-y-6">
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        
    <div class="my-6 w-full space-y-6">
        <h1 class="text-3xl font-bold text-center">{{ __('Lista de Productos') }}</h1>
        <div class="flex justify-end">
            <a href="{{ route('productos.create') }}" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Crear Producto') }}</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full dark:bg-gray-900 shadow-md rounded-lg overflow-hidden">
                <thead class=" dark:bg-gray-700">
                    <tr>
                        <th class="py-3 px-6 text-left">{{ __('ID') }}</th>
                        <th class="py-3 px-6 text-left">{{ __('Nombre') }}</th>
                        <th class="py-3 px-6 text-left">{{ __('Precio') }}</th>
                        <th class="py-3 px-6 text-left">{{ __('Descripcion') }}</th>
                        <th class="py-3 px-6 text-right">{{ __('Acciones') }}</th>
                    </tr>
                </thead>
                <tbody class="text-white-700 ">
                    @foreach ($productos as $producto)
                        <tr class="border-b border-dark-200 dark:border-gray-700">
                            <td class="py-3 px-6">{{ $producto->id }}</td>
                            <td class="py-3 px-6">{{ $producto->nombre }}</td>
                            <td class="py-3 px-6">{{ $producto->precio }}</td>
                            <td class="py-3 px-6">{{ $producto->descripcion }}</td>
                            <td class="py-3 px-6 text-right">
                                <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">{{ __('Ver') }}</a>
                                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">{{ __('Editar') }}</a>
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">{{ __('Eliminar') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
