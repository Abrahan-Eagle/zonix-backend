<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        return Product::all();
    }

    // Crear un nuevo producto
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'nullable|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'nullable|numeric',
            'quantity' => 'nullable|integer',
        ]);

        return Product::create($validated);
    }

    // Mostrar un producto específico
    public function show($id)
    {
        return Product::findOrFail($id);
    }

    // Actualizar un producto
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'code' => 'nullable|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'nullable|numeric',
            'quantity' => 'nullable|integer',
        ]);

        $product->update($validated);

        return $product;
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(null, 204);
    }
}
