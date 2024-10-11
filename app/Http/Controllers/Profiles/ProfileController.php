<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Display a listing of profiles.
     */
    public function index()
    {
        // Obtener todos los perfiles con sus relaciones (si existen)
        $profiles = Profile::with(['user', 'addresses'])->get(); // Si hay relaciones como 'user' o 'addresses'
        return response()->json($profiles);
    }

    /**
     * Store a newly created profile in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Crear un nuevo perfil
        $profile = new Profile();
        $profile->user_id = $request->user_id;
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->city = $request->city;
        $profile->country = $request->country;
        $profile->created_at = Carbon::now();
        $profile->updated_at = Carbon::now();

        // Guardar el perfil
        $profile->save();

        return response()->json(['message' => 'Profile created successfully', 'profile' => $profile], 201);
    }

    /**
     * Display the specified profile.
     */
    public function show($id)
    {
        // Buscar el perfil por ID con sus relaciones (si existen)
        $profile = Profile::with(['user', 'addresses'])->find($id);

        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        return response()->json($profile);
    }

    /**
     * Update the specified profile in storage.
     */
    public function update(Request $request, $id)
    {
        // Buscar el perfil por ID
        $profile = Profile::find($id);

        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Actualizar el perfil con los nuevos datos
        $profile->first_name = $request->first_name ?? $profile->first_name;
        $profile->last_name = $request->last_name ?? $profile->last_name;
        $profile->phone = $request->phone ?? $profile->phone;
        $profile->address = $request->address ?? $profile->address;
        $profile->city = $request->city ?? $profile->city;
        $profile->country = $request->country ?? $profile->country;
        $profile->updated_at = Carbon::now();

        // Guardar los cambios
        $profile->save();

        return response()->json(['message' => 'Profile updated successfully', 'profile' => $profile]);
    }

    /**
     * Remove the specified profile from storage.
     */
    public function destroy($id)
    {
        // Buscar el perfil por ID
        $profile = Profile::find($id);

        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        // Eliminar el perfil
        $profile->delete();

        return response()->json(['message' => 'Profile deleted successfully']);
    }
}
