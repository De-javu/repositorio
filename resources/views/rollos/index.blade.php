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
        <h1 class="text-3xl font-bold text-center">{{ __('Lista de Consulta') }}</h1>
        <div class="flex justify-end">
            <a href="{{ route('productos.create') }}" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Crear Producto') }}</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full dark:bg-gray-900 shadow-md rounded-lg overflow-hidden">
                <thead class=" dark:bg-gray-700">
                    <tr>
                        <th class="py-3 px-6 text-left">{{ __('ID') }}</th>
                        <th class="py-3 px-6 text-left">{{ __('Prontuario') }}</th>
                        <th class="py-3 px-6 text-left">{{ __('Nombre') }}</th>
                        <th class="py-3 px-6 text-left">{{ __('Apellido') }}</th>
                        <th class="py-3 px-6 text-left">{{ __('Identificacion') }}</th>
                        <th class="py-3 px-6 text-right">{{ __('nombe Archivo') }}</th>
                        <th class="py-3 px-6 text-right">{{ __('IMAGEN') }}</th>
                    </tr>
                </thead>
                <tbody class="text-white-700 ">
                    @foreach ($consulta as $rollo)
                        <tr class="border-b border-dark-200 dark:border-gray-700">
                            <td class="py-3 px-6">{{ $rollo->id }}</td>
                            <td class="py-3 px-6">{{ $rollo->prontuario }}</td>
                            <td class="py-3 px-6">{{ $rollo->nombre}}</td>
                            <td class="py-3 px-6">{{ $rollo->apellido }}</td>
                            <td class="py-3 px-6">{{ $rollo->identificacion }}</td>
                            <td class="py-3 px-6">{{ $rollo->nombrearchivo }}</td>
                            <td class="py-3 px-6">
                                   @if (Str::endsWith($rollo->nombrearchivo, '.pdf'))
                                        <!-- Enlace para archivos PDF -->
                                        <a href="{{ Storage::url('rollos/' . $rollo->nombrearchivo) }}" target="_blank" class="text-blue-500 hover:underline">
                                            {{ __('Ver PDF') }}
                                        </a>
                                    @else
                                        <!-- Mostrar imagen si no es un PDF -->
                                        <img src="{{ Storage::url('rollos/' . $rollo->nombrearchivo) }}" alt="Imagen" class="w-20 h-20 object-cover rounded-full">
                                    @endif
                                </td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Paginación -->
{{ $consulta->links() }}
        </div>
    </div>
</x-layouts.app>