<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Http\Requests\StoreAssignmentRequest;
use App\Http\Requests\UpdateAssignmentRequest;

class AssignmentController extends Controller
{
    public function index()
    {
        return Assignment::with(['classroom', 'subject', 'teacher'])->get();
    }

    public function store(StoreAssignmentRequest $request)
    {
        $assignment = Assignment::create($request->validated());
        return response()->json($assignment->load(['classroom', 'subject', 'teacher']), 201);
    }

    public function show(Assignment $assignment)
    {
        return $assignment->load(['classroom', 'subject', 'teacher']);
    }

    public function update(UpdateAssignmentRequest $request, Assignment $assignment)
    {
        $assignment->update($request->validated());
        return $assignment->load(['classroom', 'subject', 'teacher']);
    }

    public function destroy(Assignment $assignment)
    {
        $assignment->delete();
        return response()->json(null, 204);
    }
}
