<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Http\Requests\StoreNoticeRequest;
use App\Http\Requests\UpdateNoticeRequest;

class NoticeController extends Controller
{
    public function index()
    {
        return Notice::with('poster')->get();
    }

    public function store(StoreNoticeRequest $request)
    {
        $notice = Notice::create($request->validated());
        return response()->json($notice->load('poster'), 201);
    }

    public function show(Notice $notice)
    {
        return $notice->load('poster');
    }

    public function update(UpdateNoticeRequest $request, Notice $notice)
    {
        $notice->update($request->validated());
        return $notice->load('poster');
    }

    public function destroy(Notice $notice)
    {
        $notice->delete();
        return response()->json(null, 204);
    }
}
