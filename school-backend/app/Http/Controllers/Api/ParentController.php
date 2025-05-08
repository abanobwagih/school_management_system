<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ParentProfile;
use App\Http\Requests\StoreParentProfileRequest;
use App\Http\Requests\UpdateParentProfileRequest;

class ParentController extends Controller
{
    public function index()
    {
        return ParentProfile::with('user')->get();
    }

    public function store(StoreParentProfileRequest $request)
    {
        $parent = ParentProfile::create($request->validated());
        return response()->json($parent->load('user'), 201);
    }

    public function show(ParentProfile $parentProfile)
    {
        return $parentProfile->load('user');
    }

    public function update(UpdateParentProfileRequest $request, ParentProfile $parentProfile)
    {
        $parentProfile->update($request->validated());
        return $parentProfile->load('user');
    }

    public function destroy(ParentProfile $parentProfile)
    {
        $parentProfile->delete();
        return response()->json(null, 204);
    }
}
