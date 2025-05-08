<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;

class ClassroomController extends Controller
{
    public function index()
    {
        return Classroom::all();
    }

    public function store(StoreClassroomRequest $request)
    {
        $classroom = Classroom::create($request->validated());
        return response()->json($classroom, 201);
    }

    public function show(Classroom $classroom)
    {
        return $classroom;
    }

    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        $classroom->update($request->validated());
        return $classroom;
    }

    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return response()->json(null, 204);
    }
}
