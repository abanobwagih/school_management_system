<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mark;
use App\Http\Requests\StoreMarkRequest;
use App\Http\Requests\UpdateMarkRequest;

class MarkController extends Controller
{
    public function index()
    {
        return Mark::with(['student', 'subject', 'exam'])->get();
    }

    public function store(StoreMarkRequest $request)
    {
        $mark = Mark::create($request->validated());
        return response()->json($mark->load(['student', 'subject', 'exam']), 201);
    }

    public function show(Mark $mark)
    {
        return $mark->load(['student', 'subject', 'exam']);
    }

    public function update(UpdateMarkRequest $request, Mark $mark)
    {
        $mark->update($request->validated());
        return $mark->load(['student', 'subject', 'exam']);
    }

    public function destroy(Mark $mark)
    {
        $mark->delete();
        return response()->json(null, 204);
    }
}
