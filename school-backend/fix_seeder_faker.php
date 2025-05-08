<?php

// Script to add $faker property to all seeder classes

$seederDir = __DIR__ . '/database/seeders/';
$files = glob($seederDir . '*.php');

foreach ($files as $file) {
    $content = file_get_contents($file);

    // Skip if already has $faker property
    if (strpos($content, 'protected $faker;') !== false) {
        echo "Skipped: $file (already has \$faker)\n";
        continue;
    }

    // Add use Faker\Generator; after namespace
    if (strpos($content, 'use Faker\Generator;') === false) {
        $content = preg_replace(
            '/namespace Database\\\\Seeders;\n/',
            "namespace Database\\Seeders;\n\nuse Faker\\Generator;\n",
            $content
        );
    }

    // Add $faker property with PHPDoc
    $content = preg_replace(
        '/class (\w+Seeder) extends Seeder\n{/',
        "class $1 extends Seeder\n{\n    /**\n     * The Faker instance.\n     *\n     * @var \\Faker\\Generator\n     */\n    protected \$faker;\n",
        $content
    );

    // Write back to file
    file_put_contents($file, $content);
    echo "Updated: $file\n";
}

echo "All seeder classes updated successfully!\n";
