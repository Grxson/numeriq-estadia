<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tema;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     public function index()
     {
         $temas = Tema::all();
         return response()->json($temas);
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
        //Validacion de los datos enviados desde el frontend
          $validatedData = $request->validate([
            'nombreTema' => 'required|string|max:255',
            'descripcionTema' => 'nullable|string',
            'imagenTema' => 'nullable|image|max:2048',
            'numUsuarios' => 'required|integer|min:0',
            'likes' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'idCategoria' => 'required|exists:categorias,idCategoria',
            'idNivel' => 'required|exists:nivel_educativos,idNivel',
            'horasContenido' => 'required|integer|min:0',
            'fechaUltimaActualizacion' => 'required|date',
            'idioma' => 'required|string|max:255',
            'certificado' => 'required|boolean',
        ], [
            'nombreTema.required' => 'El nombre del tema es obligatorio.',
            'imagenTema.image' => 'La imagen debe ser un archivo válido.',
            'idCategoria.exists' => 'La categoría seleccionada no es válida.',
            'idNivel.exists' => 'El nivel educativo seleccionado no es válido.',
            // Agrega más mensajes si es necesario.
        ]);
        

        // Guardar el registro
        $tema = new Tema();
        $tema->nombreTema = $validatedData['nombreTema'];
        $tema->descripcionTema = $validatedData['descripcionTema'];
        if ($request->hasFile('imagenTema')) {
            $tema->imagenTema = $request->file('imagenTema')->store('temas_imagenes', 'public');
        }
        $tema->numUsuarios = $validatedData['numUsuarios'];
        $tema->likes = $validatedData['likes'];
        $tema->precio = $validatedData['precio'];
        $tema->idCategoria = $validatedData['idCategoria'];
        $tema->idNivel = $validatedData['idNivel'];
        $tema->horasContenido = $validatedData['horasContenido'];
        $tema->fechaUltimaActualizacion = $validatedData['fechaUltimaActualizacion'];
        $tema->idioma = $validatedData['idioma'];
        $tema->certificado = $validatedData['certificado'];
        $tema->save();

        // Respuesta JSON
        try {
            $tema->save();
            return response()->json([
                'message' => 'Tema creado exitosamente',
                'tema' => $tema
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al guardar el tema',
                'error' => $e->getMessage()
            ], 500);
        }        
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $tema = Tema::find($id);

    if (!$tema) {
        return response()->json([
            'success' => false,
            'message' => 'Tema no encontrado'
        ], 404);
    }

    return response()->json($tema);
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
