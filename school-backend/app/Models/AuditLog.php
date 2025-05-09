<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    protected $fillable = [
        'user_id', 'ip_address', 'method', 'url',
        'request_headers', 'request_payload',
        'response_status', 'response_headers', 'response_content',
    ];

    protected $casts = [
        'request_headers' => 'array',
        'request_payload' => 'array',
        'response_headers' => 'array',
        'response_content' => 'array',
    ];
}
