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
       

        <div class="mb-4">
            <form action="{{ route('rollos.index') }}" method="GET" class="flex items-center">
                <input 
                    type="text" 
                    name="buscar" 
                    placeholder="Buscar..." 
                    value="{{ request('buscar') }}" 
                    class="border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                <button 
                    type="submit" 
                    class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Buscar
                </button>
            </form>
        </div>

        <!-- Mostrar mensajes de búsqueda -->
    @if ($buscar)
          @if ($encontrado)
        <div class="mb-4 text-green-500 font-bold">
            {{ __('Se encontraron resultados para:') }} "{{ $buscar }}"
        </div>
          @else
        <div class="mb-4 text-red-500 font-bold">
            {{ __('No se encontraron resultados para:') }} "{{ $buscar }}". {{ __('Intenta con otro término.') }}
        </div>
        @endif
    @endif

        <div class="overflow-x-auto">
            <table class="min-w-full dark:bg-gray-900 shadow-md rounded-lg overflow-hidden">
                <thead class=" dark:bg-gray-700">
                    <tr>
                        <th class="py-3 px-6 text-left">{{ __('ID') }}</th>
                        <th class="py-3 px-6 text-left">{{ __('Prontuario') }}</th>
                        <th class="py-3 px-6 text-left">{{ __('Nombre') }}</th>
                        <th class="py-3 px-6 text-left">{{ __('Apellido') }}</th>
                        <th class="py-3 px-6 text-left">{{ __('Identificacion') }}</th>
                        {{-- <th class="py-3 px-6 text-right">{{ __('nombe Archivo') }}</th> lo ocultamos--}}
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
                        {{-- <td class="py-3 px-6">{{ $rollo->nombrearchivo }}</td> --}}
                          

                            <td class="py-3 px-6">
                                @if (Str::endsWith($rollo->nombrearchivo, '.pdf'))
                                    <a href="{{ Storage::disk('s3')->temporaryUrl('rollos/' . $rollo->nombrearchivo, now()->addMinutes(10)) }}" target="_blank" class="text-blue-500 hover:underline">
                                        {{ __('Ver PDF') }}
                                    </a>
                                @else
                                    <img src="{{ Storage::disk('s3')->temporaryUrl('rollos/' . $rollo->nombrearchivo, now()->addMinutes(10)) }}" alt="Imagen" class="w-20 h-20 object-cover rounded-full">
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