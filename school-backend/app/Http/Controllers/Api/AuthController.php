<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserSession;
use Carbon\Carbon;

class AuthController extends Controller
{
    /**
     * Handle user login and issue Sanctum token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
  public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::guard('web')->attempt($credentials)) {
        $user = Auth::guard('web')->user();
        $token = $user->createToken('auth_token')->plainTextToken;

         // Store session with IP address
            UserSession::create([
                'user_id' => $user->id,
                'token' => $token,
                'ip_address' => $request->ip(),
                'expires_at' => Carbon::now()->addDays(7), // Adjust expiration as needed
            ]);


        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'roles' => $user->getRoleNames(),
            ],
            'token' => $token,
        ], 200);
    }

    return response()->json(['message' => 'Invalid credentials'], 401);
}


}
