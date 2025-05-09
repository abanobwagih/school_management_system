<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    /**
     * Retrieve audit logs with optional filters.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $query = AuditLog::with('user')->latest();

        // Optional filters
        if ($request->has('user_id')) {
            $query->where('user_id', $request->input('user_id'));
        }
        if ($request->has('method')) {
            $query->where('method', $request->input('method'));
        }
        if ($request->has('url')) {
            $query->where('url', 'like', '%' . $request->input('url') . '%');
        }
        if ($request->has('status')) {
            $query->where('response_status', $request->input('status'));
        }

        $logs = $query->paginate(20);

        return response()->json($logs);
    }
}
