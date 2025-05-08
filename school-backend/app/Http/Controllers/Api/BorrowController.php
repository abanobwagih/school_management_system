<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Borrow;
use App\Http\Requests\StoreBorrowRequest;
use App\Http\Requests\UpdateBorrowRequest;

class BorrowController extends Controller
{
    public function index()
    {
        return Borrow::with(['student', 'book'])->get();
    }

    public function store(StoreBorrowRequest $request)
    {
        $borrow = Borrow::create($request->validated());
        return response()->json($borrow->load(['student', 'book']), 201);
    }

    public function show(Borrow $borrow)
    {
        return $borrow->load(['student', 'book']);
    }

    public function update(UpdateBorrowRequest $request, Borrow $borrow)
    {
        $borrow->update($request->validated());
        return $borrow->load(['student', 'book']);
    }

    public function destroy(Borrow $borrow)
    {
        $borrow->delete();
        return response()->json(null, 204);
    }
}
