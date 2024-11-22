<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
        // Validación de los datos de entrada.
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'firstName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'lastName' => 'required|string|max:255',
            'secondLastName' => 'nullable|string|max:255',
            'photo_users' => 'nullable|image|mimes:jpeg,png,jpg',
            'date_of_birth' => 'required|date',
            'maritalStatus' => 'required|in:married,divorced,single',
            'sex' => 'required|in:F,M',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Preparar los datos para la creación del perfil.
        $profileData = $request->only([
            'user_id', 'firstName', 'middleName', 'lastName', 'secondLastName',
            'date_of_birth', 'maritalStatus', 'sex'
        ]);
        $profileData['status'] = 'notverified'; // Estado inicial.

        // Manejar la carga de la imagen.
        if ($request->hasFile('photo_users')) {
            // Obtener la URL base según el entorno.
            $baseUrl = env('APP_ENV') === 'production'
                ? env('APP_URL_PRODUCTION')
                : env('APP_URL_LOCAL');

            // Guardar la nueva imagen en el disco público.
            $path = $request->file('photo_users')->store('profile_images', 'public');
            $profileData['photo_users'] = $baseUrl . '/storage/' . $path; // Guarda la URL pública.
        }

        // Crear el perfil.
        $profile = Profile::create($profileData);

        return response()->json([
            'message' => 'Perfil creado exitosamente.',
            'profile' => $profile
        ], 201);
    }

    /**
     * Mostrar un perfil específico.
     */
    public function show($id)
    {
        $profile = Profile::with(['user', 'addresses'])->where('user_id', $id)->first();

        if (!$profile) {
            return response()->json(['message' => 'Perfil no encontrado'], 404);
        }

        return response()->json($profile);
    }

    public function update(Request $request, $id)
    {
        // Buscar el perfil por ID o devolver error 404.
        $profile = Profile::findOrFail($id);

        // Validar los datos recibidos.
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'lastName' => 'required|string|max:255',
            'secondLastName' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date',
            'maritalStatus' => 'required|string|in:married,divorced,single',
            'sex' => 'required|in:M,F',
            'photo_users' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

            // Obtener el nombre del perfil y la fecha de creación
        $created_at = $profile->created_at->format('YmdHis'); // Formato de fecha
        $date_of_birth = Carbon::parse($validatedData['date_of_birth'])->format('Ymd'); // Formato de fecha de nacimiento
        $firstName = $validatedData['firstName'];
        $lastName = $validatedData['lastName'];
        $randomDigits = strtoupper(substr(md5(mt_rand()), 0, 7)); // Generar 7 caracteres aleatorios

        // Crear el nuevo nombre de la imagen
        $newImageName = "photo_users-{$created_at}-{$date_of_birth}-{$firstName}-{$lastName}-{$randomDigits}.jpg";


        $photo_usersxxx = $profile->photo_users;

        // Actualizar los campos del perfil.
        $profile->fill($validatedData);

        // Obtener la URL base según el entorno.
        $baseUrl = env('APP_ENV') === 'production'
            ? env('APP_URL_PRODUCTION')
            : env('APP_URL_LOCAL');

        // Manejo del archivo (si se sube uno nuevo).
        if ($request->hasFile('photo_users')) {
            // Eliminar la imagen anterior si existe.
            if ($profile->photo_users) {
                // Log de la imagen anterior desde la base de datos
                Storage::disk('public')->delete(str_replace($baseUrl . '/storage/', '', $photo_usersxxx));
            } else {
                Log::info('No hay imagen anterior para eliminar.');
            }

            // Guardar la nueva imagen en el disco público.
            $path = $request->file('photo_users')->storeAs('profile_images', $newImageName, 'public');
            $profile->photo_users = $baseUrl . '/storage/' . $path;
        }

        // Guardar los cambios.
        $profile->save();

        return response()->json([
            'message' => 'Perfil actualizado exitosamente.',
            'profile' => $profile,
            'isSuccess' => true
        ], 200);
    }

    /**
     * Eliminar un perfil.
     */
    public function destroy($id)
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return response()->json(['message' => 'Perfil no encontrado'], 404);
        }

        // Eliminar la imagen asociada si existe.
        if ($profile->photo_users) {
            $baseUrl = env('APP_ENV') === 'production'
                ? env('APP_URL_PRODUCTION')
                : env('APP_URL_LOCAL');
            Storage::disk('public')->delete(str_replace($baseUrl . '/storage/', '', $profile->photo_users));
        }

        $profile->delete();

        return response()->json(['message' => 'Perfil eliminado exitosamente']);
    }
}
