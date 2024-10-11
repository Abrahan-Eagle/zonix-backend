<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Email;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    /**
     * Display a listing of the emails.
     */
    public function index()
    {
        // Obtener todos los correos electrónicos
        $emails = Email::with('profile')->get();
        return response()->json($emails);
    }

    /**
     * Store a newly created email in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'profile_id' => 'required|exists:profiles,id',
            'email' => 'required|email|unique:emails,email',
            'is_primary' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Verificar si se está tratando de establecer un correo electrónico principal
        if ($request->is_primary) {
            Email::where('profile_id', $request->profile_id)->update(['is_primary' => false]);
        }

        // Crear un nuevo correo electrónico
        $email = Email::create([
            'profile_id' => $request->profile_id,
            'email' => $request->email,
            'is_primary' => $request->is_primary,
        ]);

        return response()->json(['message' => 'Email created successfully', 'email' => $email], 201);
    }

    /**
     * Display the specified email.
     */
    public function show($id)
    {
        // Buscar el correo electrónico por ID
        $email = Email::with('profile')->find($id);

        if (!$email) {
            return response()->json(['message' => 'Email not found'], 404);
        }

        return response()->json($email);
    }

    /**
     * Update the specified email in storage.
     */
    public function update(Request $request, $id)
    {
        // Buscar el correo electrónico por ID
        $email = Email::find($id);

        if (!$email) {
            return response()->json(['message' => 'Email not found'], 404);
        }

        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'profile_id' => 'exists:profiles,id',
            'email' => 'email|unique:emails,email,' . $id,
            'is_primary' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Actualizar el estado de 'is_primary' si es necesario
        if ($request->is_primary) {
            Email::where('profile_id', $email->profile_id)->update(['is_primary' => false]);
        }

        // Actualizar el correo electrónico
        $email->profile_id = $request->profile_id ?? $email->profile_id;
        $email->email = $request->email ?? $email->email;
        $email->is_primary = $request->is_primary ?? $email->is_primary;

        // Guardar los cambios
        $email->save();

        return response()->json(['message' => 'Email updated successfully', 'email' => $email]);
    }

    /**
     * Remove the specified email from storage.
     */
    public function destroy($id)
    {
        // Buscar el correo electrónico por ID
        $email = Email::find($id);

        if (!$email) {
            return response()->json(['message' => 'Email not found'], 404);
        }

        // Eliminar el correo electrónico
        $email->delete();

        return response()->json(['message' => 'Email deleted successfully']);
    }
}
