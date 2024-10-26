<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use App\Models\OperatorCode;
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
    //     $phones = Phone::with(['profile', 'operatorCode'])->get();
    //     return response()->json($phones);

        $operatorCode = OperatorCode::all();
        return response()->json($operatorCode);
    }

    /**
     * Store a newly created phone in storage.
     */
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'profile_id' => 'required|exists:profiles,id',
    //         'operator_code_id' => 'required|exists:operator_codes,id',
    //         'number' => 'required|string|min:7|max:7|unique:phones,number',
    //         'is_primary' => 'boolean',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->errors()], 400);
    //     }

    //     // Si se marca como principal, desmarcar otros teléfonos principales del mismo perfil
    //     if ($request->is_primary) {
    //         Phone::where('profile_id', $request->profile_id)
    //             ->where('is_primary', true)
    //             ->update(['is_primary' => false]);
    //     }

    //     // Crear el nuevo teléfono

    //     $phone = Phone::create([
    //         'profile_id' => $request->profile_id,
    //         'number' => $request->number,
    //         'is_primary' => $request->is_primary ?? false,
    //     ]);

    //     return response()->json(['message' => 'Phone created successfully', 'phone' => $phone], 201);
    // }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile_id' => 'required|exists:profiles,id',
            'operator_code_id' => 'required|exists:operator_codes,id',
            'number' => 'required|string|min:7|max:15|unique:phones,number',
            'is_primary' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        if ($request->is_primary) {
            Phone::where('profile_id', $request->profile_id)
                ->where('is_primary', true)
                ->update(['is_primary' => false]);
        }

        $phone = Phone::create([
            'profile_id' => $request->profile_id,
            'operator_code_id' => $request->operator_code_id, // Agregar este campo si es necesario
            'number' => $request->number,
            'is_primary' => $request->is_primary ?? false,
        ]);

        return response()->json(['message' => 'Phone created successfully', 'phone' => $phone], 201);
    }

    /**
     * Display the specified phone.
     */
    public function show($id)
    {
        $phone = Phone::with(['profile', 'operatorCode'])->where('profile_id', $id)->where('status', true)->get();

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
           'is_primary' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Si se marca como principal, desmarcar otros teléfonos principales del mismo perfil

        if ($request->is_primary) {
            Phone::where('profile_id', $phone->profile_id)
                ->where('id', '!=', $phone->id) // Excluir el email actual
                ->update(['is_primary' => false]);
        }

        // Actualizar los datos del teléfono
        // Actualizar el campo 'is_primary'
        $phone->is_primary = $request->is_primary;
        $phone->save();

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

        $phone->status = false;
        $phone->save();

        return response()->json(['message' => 'Phone deleted successfully']);
    }
}
