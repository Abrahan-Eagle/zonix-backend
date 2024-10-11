<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class DocumentController extends Controller
{
    /**
     * Display a listing of documents.
     */
    public function index()
    {
        // Obtener todos los documentos con sus relaciones (si existen)
        $documents = Document::with('profile')->get();
        return response()->json($documents);
    }

    /**
     * Store a newly created document in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'profile_id' => 'required|exists:profiles,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048', // Ajustar tipos y tamaño según sea necesario
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Manejar la carga del archivo
        $filePath = $request->file('file')->store('documents', 'public');

        // Crear un nuevo documento
        $document = Document::create([
            'profile_id' => $request->profile_id,
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
        ]);

        return response()->json(['message' => 'Document created successfully', 'document' => $document], 201);
    }

    /**
     * Display the specified document.
     */
    public function show($id)
    {
        // Buscar el documento por ID con su relación (si existe)
        $document = Document::with('profile')->find($id);

        if (!$document) {
            return response()->json(['message' => 'Document not found'], 404);
        }

        return response()->json($document);
    }

    /**
     * Update the specified document in storage.
     */
    public function update(Request $request, $id)
    {
        // Buscar el documento por ID
        $document = Document::find($id);

        if (!$document) {
            return response()->json(['message' => 'Document not found'], 404);
        }

        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'title' => 'string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Actualizar el documento
        if ($request->hasFile('file')) {
            // Eliminar el archivo anterior si existe
            Storage::disk('public')->delete($document->file_path);
            // Manejar la carga del nuevo archivo
            $document->file_path = $request->file('file')->store('documents', 'public');
        }

        $document->title = $request->title ?? $document->title;
        $document->description = $request->description ?? $document->description;
        $document->updated_at = Carbon::now();

        // Guardar los cambios
        $document->save();

        return response()->json(['message' => 'Document updated successfully', 'document' => $document]);
    }

    /**
     * Remove the specified document from storage.
     */
    public function destroy($id)
    {
        // Buscar el documento por ID
        $document = Document::find($id);

        if (!$document) {
            return response()->json(['message' => 'Document not found'], 404);
        }

        // Eliminar el archivo del almacenamiento
        Storage::disk('public')->delete($document->file_path);

        // Eliminar el documento
        $document->delete();

        return response()->json(['message' => 'Document deleted successfully']);
    }
}
