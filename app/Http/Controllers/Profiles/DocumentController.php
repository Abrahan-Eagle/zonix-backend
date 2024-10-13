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
            'type' => 'required|in:ci,passport,rif', // Campo para el tipo de documento
            'number' => 'nullable|integer',
            'RECEIPT_N' => 'nullable|integer', // Asegúrate de que este campo sea correcto
            'rif_url' => 'nullable|string',
            'taxDomicile' => 'nullable|string',
            'front_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Ajustar tipos y tamaño según sea necesario
            'back_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'issued_at' => 'nullable|date',
            'expires_at' => 'nullable|date|after_or_equal:issued_at', // Validación de fecha
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Determinar la carpeta según el tipo de documento
        $folder = match($request->type) {
            'ci' => 'documents/ci',
            'rif' => 'documents/rif',
            'passport' => 'documents/passport',
        };

        // Manejar la carga de las imágenes
        $frontImagePath = $request->file('front_image') ? $request->file('front_image')->store($folder.'/front', 'public') : null;
        $backImagePath = $request->file('back_image') ? $request->file('back_image')->store($folder.'/back', 'public') : null;

        // Crear un nuevo documento
        $document = Document::create([
            'profile_id' => $request->profile_id,
            'type' => $request->type,
            'number' => $request->number,
            'RECEIPT_N' => $request->RECEIPT_N,
            'rif_url' => $request->rif_url,
            'taxDomicile' => $request->taxDomicile,
            'front_image' => $frontImagePath,
            'back_image' => $backImagePath,
            'issued_at' => $request->issued_at,
            'expires_at' => $request->expires_at,
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
            'type' => 'nullable|in:ci,passport,rif', // Validar el tipo de documento
            'number' => 'nullable|integer',
            'RECEIPT_N' => 'nullable|integer',
            'rif_url' => 'nullable|string',
            'taxDomicile' => 'nullable|string',
            'front_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'back_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'issued_at' => 'nullable|date',
            'expires_at' => 'nullable|date|after_or_equal:issued_at', // Validación de fecha
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Determinar la carpeta según el tipo de documento
        $folder = match($request->type ?? $document->type) {
            'ci' => 'documents/ci',
            'rif' => 'documents/rif',
            'passport' => 'documents/passport',
        };

        // Actualizar el documento
        if ($request->hasFile('front_image')) {
            Storage::disk('public')->delete($document->front_image); // Eliminar la imagen anterior
            $document->front_image = $request->file('front_image')->store($folder.'/front', 'public');
        }

        if ($request->hasFile('back_image')) {
            Storage::disk('public')->delete($document->back_image); // Eliminar la imagen anterior
            $document->back_image = $request->file('back_image')->store($folder.'/back', 'public');
        }

        $document->type = $request->type ?? $document->type;
        $document->number = $request->number ?? $document->number;
        $document->RECEIPT_N = $request->RECEIPT_N ?? $document->RECEIPT_N;
        $document->rif_url = $request->rif_url ?? $document->rif_url;
        $document->taxDomicile = $request->taxDomicile ?? $document->taxDomicile;
        $document->issued_at = $request->issued_at ?? $document->issued_at;
        $document->expires_at = $request->expires_at ?? $document->expires_at;
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

        // Eliminar los archivos del almacenamiento
        if ($document->front_image) {
            Storage::disk('public')->delete($document->front_image);
        }
        if ($document->back_image) {
            Storage::disk('public')->delete($document->back_image);
        }

        // Eliminar el documento
        $document->delete();

        return response()->json(['message' => 'Document deleted successfully']);
    }
}
