<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FeeStructure;
use App\Http\Requests\StoreFeeStructureRequest;
use App\Http\Requests\UpdateFeeStructureRequest;

class FeeStructureController extends Controller
{
    public function index()
    {
        return FeeStructure::all();
    }

    public function store(StoreFeeStructureRequest $request)
    {
        $feeStructure = FeeStructure::create($request->validated());
        return response()->json($feeStructure, 201);
    }

    public function show(FeeStructure $feeStructure)
    {
        return $feeStructure;
    }

    public function update(UpdateFeeStructureRequest $request, FeeStructure $feeStructure)
    {
        $feeStructure->update($request->validated());
        return $feeStructure;
    }

    public function destroy(FeeStructure $feeStructure)
    {
        $feeStructure->delete();
        return response()->json(null, 204);
    }
}
