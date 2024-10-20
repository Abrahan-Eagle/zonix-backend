<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    /**
     * Display a listing of the addresses.
     */
    public function index()
    {
        // Obtener todas las direcciones
        $addresses = Address::with(['profile', 'city'])->get();
        return response()->json($addresses);
    }

    /**
     * Store a newly created address in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'street' => 'required|string|max:255',
            'house_number' => 'required|string|max:50',
            'postal_code' => 'required|string|max:20',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'status' => 'required|in:completeData,incompleteData,notverified',
            'profile_id' => 'required|exists:profiles,id',
            'city_id' => 'required|exists:cities,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Crear una nueva dirección
        $address = Address::create([
            'street' => $request->street,
            'house_number' => $request->house_number,
            'postal_code' => $request->postal_code,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'status' => $request->status,
            'profile_id' => $request->profile_id,
            'city_id' => $request->city_id,
        ]);

        return response()->json(['message' => 'Address created successfully', 'address' => $address], 201);
    }

    /**
     * Display the specified address.
     */
    public function show($id)
    {
        // Buscar la dirección por ID
        $address = Address::with(['profile', 'city'])->find($id);

        if (!$address) {
            return response()->json(['message' => 'Address not found'], 404);
        }

        return response()->json($address);
    }

    /**
     * Update the specified address in storage.
     */
    public function update(Request $request, $id)
    {
        // Buscar la dirección por ID
        $address = Address::find($id);

        if (!$address) {
            return response()->json(['message' => 'Address not found'], 404);
        }

        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'street' => 'string|max:255',
            'house_number' => 'string|max:50',
            'postal_code' => 'string|max:20',
            'latitude' => 'numeric',
            'longitude' => 'numeric',
            'status' => 'in:completeData,incompleteData,notverified',
            'profile_id' => 'exists:profiles,id',
            'city_id' => 'exists:cities,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Actualizar la dirección
        $address->street = $request->street ?? $address->street;
        $address->house_number = $request->house_number ?? $address->house_number;
        $address->postal_code = $request->postal_code ?? $address->postal_code;
        $address->latitude = $request->latitude ?? $address->latitude;
        $address->longitude = $request->longitude ?? $address->longitude;
        $address->status = $request->status ?? $address->status;
        $address->profile_id = $request->profile_id ?? $address->profile_id;
        $address->city_id = $request->city_id ?? $address->city_id;

        // Guardar los cambios
        $address->save();

        return response()->json(['message' => 'Address updated successfully', 'address' => $address]);
    }

    /**
     * Remove the specified address from storage.
     */
    public function destroy($id)
    {
        // Buscar la dirección por ID
        $address = Address::find($id);

        if (!$address) {
            return response()->json(['message' => 'Address not found'], 404);
        }

        // Eliminar la dirección
        $address->delete();

        return response()->json(['message' => 'Address deleted successfully']);
    }
}
