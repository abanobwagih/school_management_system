<?php

// Script to update all FormRequest classes to fix auth()->user() error

$requestDir = __DIR__ . '/app/Http/Requests/';
$files = glob($requestDir . '*.php');

foreach ($files as $file) {
    $content = file_get_contents($file);

    // Replace auth()->user() with request()->user()
    $updatedContent = preg_replace(
        '/auth\(\)->user\(\)/',
        'request()->user()',
        $content
    );

    // Add null check for request()->user()
    $updatedContent = preg_replace(
        '/return request\(\)->user\(\)->hasRole\(/',
        'return request()->user() && request()->user()->hasRole(',
        $updatedContent
    );

    // Write back to file if changed
    if ($content !== $updatedContent) {
        file_put_contents($file, $updatedContent);
        echo "Updated: $file\n";
    }
}

// Add use statement for Request facade if not present
foreach ($files as $file) {
    $content = file_get_contents($file);
    if (strpos($content, 'use Illuminate\Http\Request;') === false) {
        $updatedContent = str_replace(
            "use Illuminate\Foundation\Http\FormRequest;\n",
            "use Illuminate\Foundation\Http\FormRequest;\nuse Illuminate\Http\Request;\n",
            $content
        );
        file_put_contents($file, $updatedContent);
        echo "Added Request import to: $file\n";
    }
}

echo "All FormRequest classes updated successfully!\n";
