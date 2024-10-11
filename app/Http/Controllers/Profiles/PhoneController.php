<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Phone;
use Illuminate\Support\Facades\Validator;

class PhoneController extends Controller
{
    /**
     * Display a listing of the phones.
     */
    public function index()
    {
        // Obtener todos los teléfonos
        $phones = Phone::with(['profile', 'operatorCode'])->get();
        return response()->json($phones);
    }

    /**
     * Store a newly created phone in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'profile_id' => 'required|exists:profiles,id',
            'operator_code_id' => 'required|exists:operator_codes,id',
            'number' => 'required|string|min:7|max:7',
            'is_primary' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Verificar si se está tratando de establecer un teléfono principal
        if ($request->is_primary) {
            Phone::where('profile_id', $request->profile_id)->update(['is_primary' => false]);
        }

        // Crear un nuevo teléfono
        $phone = Phone::create([
            'profile_id' => $request->profile_id,
            'operator_code_id' => $request->operator_code_id,
            'number' => $request->number,
            'is_primary' => $request->is_primary,
        ]);

        return response()->json(['message' => 'Phone created successfully', 'phone' => $phone], 201);
    }

    /**
     * Display the specified phone.
     */
    public function show($id)
    {
        // Buscar el teléfono por ID
        $phone = Phone::with(['profile', 'operatorCode'])->find($id);

        if (!$phone) {
            return response()->json(['message' => 'Phone not found'], 404);
        }

        return response()->json($phone);
    }

    /**
     * Update the specified phone in storage.
     */
    public function update(Request $request, $id)
    {
        // Buscar el teléfono por ID
        $phone = Phone::find($id);

        if (!$phone) {
            return response()->json(['message' => 'Phone not found'], 404);
        }

        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'profile_id' => 'exists:profiles,id',
            'operator_code_id' => 'exists:operator_codes,id',
            'number' => 'string|min:7|max:7',
            'is_primary' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Actualizar el estado de 'is_primary' si es necesario
        if ($request->is_primary) {
            Phone::where('profile_id', $phone->profile_id)->update(['is_primary' => false]);
        }

        // Actualizar el teléfono
        $phone->profile_id = $request->profile_id ?? $phone->profile_id;
        $phone->operator_code_id = $request->operator_code_id ?? $phone->operator_code_id;
        $phone->number = $request->number ?? $phone->number;
        $phone->is_primary = $request->is_primary ?? $phone->is_primary;

        // Guardar los cambios
        $phone->save();

        return response()->json(['message' => 'Phone updated successfully', 'phone' => $phone]);
    }

    /**
     * Remove the specified phone from storage.
     */
    public function destroy($id)
    {
        // Buscar el teléfono por ID
        $phone = Phone::find($id);

        if (!$phone) {
            return response()->json(['message' => 'Phone not found'], 404);
        }

        // Eliminar el teléfono
        $phone->delete();

        return response()->json(['message' => 'Phone deleted successfully']);
    }
}

