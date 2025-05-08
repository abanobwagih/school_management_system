<?php

$seederDir = __DIR__ . '/database/seeders';

$files = glob($seederDir . '/*.php');

foreach ($files as $file) {
    $content = file_get_contents($file);

    $updated = $content;

    // Replace $this->faker-> with fake()->
    $updated = str_replace('$this->faker->', 'fake()->', $updated);

    // Remove Faker import
    $updated = preg_replace('/use\s+Faker\\\Generator;[\r\n]*/', '', $updated);

    // Remove protected $faker; property
    $updated = preg_replace('/protected\s+\$faker\s*;[\r\n]*/', '', $updated);

    // Remove __construct with Faker init
    $updated = preg_replace('/public function __construct\(\)\s*\{[^}]*\}/s', '', $updated);

    // Save only if changed
    if ($updated !== $content) {
        file_put_contents($file, $updated);
        echo "✅ Fixed: " . basename($file) . "\n";
    } else {
        echo "✔️  Clean: " . basename($file) . "\n";
    }
}
