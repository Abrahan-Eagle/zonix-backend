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
     * Listar todos los perfiles.
     */
    public function index()
    {
        $profiles = Profile::with(['user', 'addresses'])->get();
        return response()->json($profiles);
    }

    /**
     * Crear un nuevo perfil.
     */
    public function store(Request $request)
    {
        // Validación de los datos de entrada
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'firstName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'lastName' => 'required|string|max:255',
            'secondLastName' => 'nullable|string|max:255',
            'photo_users' => 'nullable|url',
            'date_of_birth' => 'required|date',
            'maritalStatus' => 'required|in:married,divorced,single',
            'sex' => 'required|in:F,M',
            'status' => 'required|in:completeData,incompleteData,notverified',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Crear y guardar el perfil
        $profile = Profile::create([
            'user_id' => $request->user_id,
            'firstName' => $request->firstName,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'secondLastName' => $request->secondLastName,
            'photo_users' => $request->photo_users,
            'date_of_birth' => $request->date_of_birth,
            'maritalStatus' => $request->maritalStatus,
            'sex' => $request->sex,
            'status' => $request->status,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return response()->json(['message' => 'Profile created successfully', 'profile' => $profile], 201);
    }

    /**
     * Mostrar un perfil específico.
     */
    public function show($id)
    {
        $profile = Profile::with(['user', 'addresses'])->find($id);

        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        return response()->json($profile);
    }

    /**
     * Actualizar un perfil.
     */
    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        // Validación de los datos de entrada
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'firstName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'lastName' => 'required|string|max:255',
            'secondLastName' => 'nullable|string|max:255',
            'photo_users' => 'nullable|url',
            'date_of_birth' => 'required|date',
            'maritalStatus' => 'required|in:married,divorced,single',
            'sex' => 'required|in:F,M',
            'status' => 'required|in:completeData,incompleteData,notverified',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Actualizar los campos del perfil
        $profile->update([
            'firstName' => $request->firstName ?? $profile->firstName,
            'middleName' => $request->middleName ?? $profile->middleName,
            'lastName' => $request->lastName ?? $profile->lastName,
            'secondLastName' => $request->secondLastName ?? $profile->secondLastName,
            'photo_users' => $request->photo_users ?? $profile->photo_users,
            'date_of_birth' => $request->date_of_birth ?? $profile->date_of_birth,
            'maritalStatus' => $request->maritalStatus ?? $profile->maritalStatus,
            'sex' => $request->sex ?? $profile->sex,
            'status' => $request->status ?? $profile->status,
            'updated_at' => Carbon::now(),
        ]);

        return response()->json(['message' => 'Profile updated successfully', 'profile' => $profile]);
    }

    /**
     * Eliminar un perfil.
     */
    public function destroy($id)
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        $profile->delete();

        return response()->json(['message' => 'Profile deleted successfully']);
    }
}
