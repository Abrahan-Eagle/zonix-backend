<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaseModel;

class CaseController extends Controller
{
    public function index()
    {
        return CaseModel::all();
    }

    public function store(Request $request)
    {
        $case = CaseModel::create($request->all());
        return response()->json($case, 201);
    }

    public function show($id)
    {
        return CaseModel::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $case = CaseModel::findOrFail($id);
        $case->update($request->all());
        return response()->json($case, 200);
    }

    public function destroy($id)
    {
        CaseModel::destroy($id);
        return response()->json(null, 204);
    }
}
