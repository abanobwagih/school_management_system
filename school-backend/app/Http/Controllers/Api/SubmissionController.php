<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use App\Http\Requests\StoreSubmissionRequest;
use App\Http\Requests\UpdateSubmissionRequest;

class SubmissionController extends Controller
{
    public function index()
    {
        return Submission::with(['student', 'assignment'])->get();
    }

    public function store(StoreSubmissionRequest $request)
    {
        $submission = Submission::create($request->validated());
        return response()->json($submission->load(['student', 'assignment']), 201);
    }

    public function show(Submission $submission)
    {
        return $submission->load(['student', 'assignment']);
    }

    public function update(UpdateSubmissionRequest $request, Submission $submission)
    {
        $submission->update($request->validated());
        return $submission->load(['student', 'assignment']);
    }

    public function destroy(Submission $submission)
    {
        $submission->delete();
        return response()->json(null, 204);
    }
}
