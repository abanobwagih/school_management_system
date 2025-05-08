<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClassroomSubject;
use App\Http\Requests\StoreClassroomSubjectRequest;
use App\Http\Requests\UpdateClassroomSubjectRequest;

class ClassroomSubjectController extends Controller
{
    public function index()
    {
        return ClassroomSubject::with(['classroom', 'subject', 'teacher'])->get();
    }

    public function store(StoreClassroomSubjectRequest $request)
    {
        $classroomSubject = ClassroomSubject::create($request->validated());
        return response()->json($classroomSubject->load(['classroom', 'subject', 'teacher']), 201);
    }

    public function show(ClassroomSubject $classroomSubject)
    {
        return $classroomSubject->load(['classroom', 'subject', 'teacher']);
    }

    public function update(UpdateClassroomSubjectRequest $request, ClassroomSubject $classroomSubject)
    {
        $classroomSubject->update($request->validated());
        return $classroomSubject->load(['classroom', 'subject', 'teacher']);
    }

    public function destroy(ClassroomSubject $classroomSubject)
    {
        $classroomSubject->delete();
        return response()->json(null, 204);
    }
}
