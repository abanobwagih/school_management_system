<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;

class GradeController extends Controller
{
    public function index()
    {
        return Grade::all();
    }

    public function store(StoreGradeRequest $request)
    {
        $grade = Grade::create($request->validated());
        return response()->json($grade, 201);
    }

    public function show(Grade $grade)
    {
        return $grade;
    }

    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        $grade->update($request->validated());
        return $grade;
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return response()->json(null, 204);
    }
}
