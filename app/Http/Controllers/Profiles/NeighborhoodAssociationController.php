<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\NeighborhoodAssociation;
use Illuminate\Support\Facades\Validator;

class NeighborhoodAssociationController extends Controller
{
    /**
     * Display a listing of the neighborhood associations.
     */
    public function index()
    {
        // Obtener todas las asociaciones de vecindario
        $associations = NeighborhoodAssociation::all();
        return response()->json($associations);
    }

    /**
     * Store a newly created neighborhood association in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'contact_info' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Crear una nueva asociación de vecindario
        $association = NeighborhoodAssociation::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'contact_info' => $request->contact_info,
        ]);

        return response()->json(['message' => 'Neighborhood association created successfully', 'association' => $association], 201);
    }

    /**
     * Display the specified neighborhood association.
     */
    public function show($id)
    {
        // Buscar la asociación de vecindario por ID
        $association = NeighborhoodAssociation::find($id);

        if (!$association) {
            return response()->json(['message' => 'Neighborhood association not found'], 404);
        }

        return response()->json($association);
    }

    /**
     * Update the specified neighborhood association in storage.
     */
    public function update(Request $request, $id)
    {
        // Buscar la asociación de vecindario por ID
        $association = NeighborhoodAssociation::find($id);

        if (!$association) {
            return response()->json(['message' => 'Neighborhood association not found'], 404);
        }

        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'contact_info' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Actualizar la asociación de vecindario
        $association->name = $request->name ?? $association->name;
        $association->description = $request->description ?? $association->description;
        $association->location = $request->location ?? $association->location;
        $association->contact_info = $request->contact_info ?? $association->contact_info;

        // Guardar los cambios
        $association->save();

        return response()->json(['message' => 'Neighborhood association updated successfully', 'association' => $association]);
    }

    /**
     * Remove the specified neighborhood association from storage.
     */
    public function destroy($id)
    {
        // Buscar la asociación de vecindario por ID
        $association = NeighborhoodAssociation::find($id);

        if (!$association) {
            return response()->json(['message' => 'Neighborhood association not found'], 404);
        }

        // Eliminar la asociación de vecindario
        $association->delete();

        return response()->json(['message' => 'Neighborhood association deleted successfully']);
    }
}
