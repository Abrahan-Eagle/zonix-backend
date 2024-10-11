<?php

namespace App\Http\Controllers\GasTicket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GasCylinder;

class GasCylinderController extends Controller
{
    // Obtener todas las bombonas de gas
    public function index()
    {
        $cylinders = GasCylinder::all();
        return response()->json($cylinders);
    }

    // Crear una nueva bombona de gas
    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_id' => 'required|exists:gas_suppliers,id',
            'capacity' => 'required|numeric',
            'available_quantity' => 'required|numeric',
        ]);

        $cylinder = GasCylinder::create($validated);
        return response()->json($cylinder, 201);
    }

    // Mostrar una bombona específica
    public function show($id)
    {
        $cylinder = GasCylinder::findOrFail($id);
        return response()->json($cylinder);
    }

    // Actualizar una bombona de gas
    public function update(Request $request, $id)
    {
        $cylinder = GasCylinder::findOrFail($id);

        $validated = $request->validate([
            'capacity' => 'numeric',
            'available_quantity' => 'numeric',
        ]);

        $cylinder->update($validated);
        return response()->json($cylinder);
    }

    // Eliminar una bombona de gas
    public function destroy($id)
    {
        $cylinder = GasCylinder::findOrFail($id);
        $cylinder->delete();

        return response()->json(null, 204);
    }
}
