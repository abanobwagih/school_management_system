<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;

class SectionController extends Controller
{
    public function index()
    {
        return Section::with('classroom')->get();
    }

    public function store(StoreSectionRequest $request)
    {
        $section = Section::create($request->validated());
        return response()->json($section->load('classroom'), 201);
    }

    public function show(Section $section)
    {
        return $section->load('classroom');
    }

    public function update(UpdateSectionRequest $request, Section $section)
    {
        $section->update($request->validated());
        return $section->load('classroom');
    }

    public function destroy(Section $section)
    {
        $section->delete();
        return response()->json(null, 204);
    }
}
