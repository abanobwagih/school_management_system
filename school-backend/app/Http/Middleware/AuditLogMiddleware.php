<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AuditLog;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AuditLogMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        try {
            AuditLog::create([
                'user_id' => Auth::check() ? Auth::id() : null,
                'ip_address' => $request->ip(),
                'method' => $request->method(),
                'url' => $request->fullUrl(),
                'request_headers' => $request->headers->all(),
                'request_payload' => $request->except(['password', 'password_confirmation']),
                'response_status' => $response->getStatusCode(),
                'response_headers' => $response->headers->all(),
                'response_content' => $this->getResponseBody($response),
            ]);
        } catch (\Exception $e) {
            Log::error('AuditLogMiddleware error: ' . $e->getMessage());
        }

        return $response;
    }

    private function getResponseBody(Response $response)
    {
        try {
            return json_decode($response->getContent(), true) ?? ['raw' => $response->getContent()];
        } catch (\Exception $e) {
            return ['error' => 'Unable to parse response'];
        }
    }
}
