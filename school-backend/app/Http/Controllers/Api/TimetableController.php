<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Timetable;
use App\Http\Requests\StoreTimetableRequest;
use App\Http\Requests\UpdateTimetableRequest;

class TimetableController extends Controller
{
    public function index()
    {
        return Timetable::with(['classroom', 'section', 'subject', 'teacher'])->get();
    }

    public function store(StoreTimetableRequest $request)
    {
        $timetable = Timetable::create($request->validated());
        return response()->json($timetable->load(['classroom', 'section', 'subject', 'teacher']), 201);
    }

    public function show(Timetable $timetable)
    {
        return $timetable->load(['classroom', 'section', 'subject', 'teacher']);
    }

    public function update(UpdateTimetableRequest $request, Timetable $timetable)
    {
        $timetable->update($request->validated());
        return $timetable->load(['classroom', 'section', 'subject', 'teacher']);
    }

    public function destroy(Timetable $timetable)
    {
        $timetable->delete();
        return response()->json(null, 204);
    }
}
