<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;

class ExamController extends Controller
{
    public function index()
    {
        return Exam::all();
    }

    public function store(StoreExamRequest $request)
    {
        $exam = Exam::create($request->validated());
        return response()->json($exam, 201);
    }

    public function show(Exam $exam)
    {
        return $exam;
    }

    public function update(UpdateExamRequest $request, Exam $exam)
    {
        $exam->update($request->validated());
        return $exam;
    }

    public function destroy(Exam $exam)
    {
        $exam->delete();
        return response()->json(null, 204);
    }
}
