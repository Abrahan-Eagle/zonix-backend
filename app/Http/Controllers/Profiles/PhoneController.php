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
        $phones = Phone::with(['profile', 'operatorCode'])->get();
        return response()->json($phones);
    }

    /**
     * Store a newly created phone in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile_id' => 'required|exists:profiles,id',
            'operator_code_id' => 'required|exists:operator_codes,id',
            'number' => 'required|string|min:7|max:7|unique:phones,number',
            'is_primary' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Si se marca como principal, desmarcar otros teléfonos principales del mismo perfil
        if ($request->is_primary) {
            Phone::where('profile_id', $request->profile_id)
                ->where('is_primary', true)
                ->update(['is_primary' => false]);
        }

        // Crear el nuevo teléfono
        $phone = Phone::create($request->all());

        return response()->json(['message' => 'Phone created successfully', 'phone' => $phone], 201);
    }

    /**
     * Display the specified phone.
     */
    public function show($id)
    {
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
        $phone = Phone::find($id);

        if (!$phone) {
            return response()->json(['message' => 'Phone not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'profile_id' => 'exists:profiles,id',
            'operator_code_id' => 'exists:operator_codes,id',
            'number' => "string|min:7|max:7|unique:phones,number,{$id}",
            'is_primary' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Si se marca como principal, desmarcar otros teléfonos principales del mismo perfil
        if ($request->is_primary) {
            Phone::where('profile_id', $phone->profile_id)
                ->where('is_primary', true)
                ->update(['is_primary' => false]);
        }

        // Actualizar los datos del teléfono
        $phone->update($request->all());

        return response()->json(['message' => 'Phone updated successfully', 'phone' => $phone]);
    }

    /**
     * Remove the specified phone from storage.
     */
    public function destroy($id)
    {
        $phone = Phone::find($id);

        if (!$phone) {
            return response()->json(['message' => 'Phone not found'], 404);
        }

        $phone->delete();

        return response()->json(['message' => 'Phone deleted successfully']);
    }
}
