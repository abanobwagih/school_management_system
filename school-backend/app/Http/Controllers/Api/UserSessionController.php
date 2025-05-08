<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserSession;
use Illuminate\Http\Request;

class UserSessionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    /**
     * Retrieve all user sessions.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $sessions = UserSession::with('user')->get();
        return response()->json($sessions);
    }
}
