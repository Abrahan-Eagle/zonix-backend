<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NeighborhoodAssociation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class NeighborhoodAssociationController extends Controller
{
    /**
     * Listar todas las asociaciones de vecindario.
     */
    public function index()
    {
        $associations = NeighborhoodAssociation::with('profile')->get();
        return response()->json($associations);
    }

    /**
     * Crear una nueva asociación de vecindario.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'urbanization_name' => 'required|string|max:255',
            'neighborhood_proof_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'approved' => 'boolean',
            'profile_id' => 'required|exists:profiles,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $photoPath = $request->hasFile('neighborhood_proof_photo')
            ? $request->file('neighborhood_proof_photo')->store('documents/neighborhood_proofs', 'public')
            : null;

        $association = NeighborhoodAssociation::create([
            'urbanization_name' => $request->urbanization_name,
            'neighborhood_proof_photo' => $photoPath,
            'approved' => $request->approved ?? false,
            'profile_id' => $request->profile_id,
        ]);

        return response()->json(['message' => 'Neighborhood association created successfully', 'association' => $association], 201);
    }

    /**
     * Mostrar una asociación específica.
     */
    public function show($id)
    {
        $association = NeighborhoodAssociation::with('profile')->find($id);

        if (!$association) {
            return response()->json(['message' => 'Neighborhood association not found'], 404);
        }

        return response()->json($association);
    }

    /**
     * Actualizar una asociación existente.
     */
    public function update(Request $request, $id)
    {
        $association = NeighborhoodAssociation::find($id);

        if (!$association) {
            return response()->json(['message' => 'Neighborhood association not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'urbanization_name' => 'string|max:255',
            'neighborhood_proof_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'approved' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        if ($request->hasFile('neighborhood_proof_photo')) {
            Storage::disk('public')->delete($association->neighborhood_proof_photo);
            $association->neighborhood_proof_photo = $request->file('neighborhood_proof_photo')->store('documents/neighborhood_proofs', 'public');
        }

        $association->urbanization_name = $request->urbanization_name ?? $association->urbanization_name;
        $association->approved = $request->approved ?? $association->approved;
        $association->save();

        return response()->json(['message' => 'Neighborhood association updated successfully', 'association' => $association]);
    }

    /**
     * Eliminar una asociación.
     */
    public function destroy($id)
    {
        $association = NeighborhoodAssociation::find($id);

        if (!$association) {
            return response()->json(['message' => 'Neighborhood association not found'], 404);
        }

        if ($association->neighborhood_proof_photo) {
            Storage::disk('public')->delete($association->neighborhood_proof_photo);
        }

        $association->delete();

        return response()->json(['message' => 'Neighborhood association deleted successfully']);
    }
}
