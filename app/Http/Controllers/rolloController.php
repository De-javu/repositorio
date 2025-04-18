<?php

namespace App\Http\Controllers;

use App\Models\Rollo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class rolloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');
    
        $consulta = Rollo::query()
            ->when($buscar, function ($query, $buscar) {
                $query->where('nombre', 'like', "%{$buscar}%")
                      ->orWhere('apellido', 'like', "%{$buscar}%")
                      ->orWhere('prontuario', 'like', "%{$buscar}%")
                      ->orWhere('identificacion', 'like', "%{$buscar}%");
            })
            
            ->orderBy('id')
            ->paginate(5);

        // Verificar si hay resultados
       $encontrado = $consulta->count() > 0;
    
        return view('rollos.index', compact('consulta', 'buscar', 'encontrado'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'nombre' => 'required',
                'descripcion' => 'required',
                'archivo' => 'required|file', // Validar que se suba un archivo
            ]);
        
            // Guardar el archivo en el disco 'rollos'
            $archivo = $request->file('archivo');
            $nombreArchivo = $archivo->getClientOriginalName();
            $archivo->storeAs('', $nombreArchivo, 'rollos');
        
            // Crear el registro en la base de datos
            Rollo::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'archivo' => $nombreArchivo, // Guardar el nombre del archivo en la base de datos
            ]);
        
            return redirect()->route('rollos.index')->with('success', 'Archivo subido correctamente.');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
