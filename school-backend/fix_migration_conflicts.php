<?php

// Script to fix migration conflicts and update Role/Permission models/seeders

$migrationDir = __DIR__ . '/database/migrations/';
$modelDir = __DIR__ . '/app/Models/';
$seederDir = __DIR__ . '/database/seeders/';

// Delete redundant migrations
$redundantMigrations = [
    'create_roles_table',
    'create_permissions_table',
];

foreach (glob($migrationDir . '*.php') as $file) {
    foreach ($redundantMigrations as $pattern) {
        if (strpos(basename($file), $pattern) !== false) {
            unlink($file);
            echo "Deleted redundant migration: $file\n";
        }
    }
}

// Update Role model
$roleFile = $modelDir . 'Role.php';
$newRoleContent = <<<PHP
<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected \$fillable = [
        'name',
        'guard_name',
    ];
}
PHP;
file_put_contents($roleFile, $newRoleContent);
echo "Updated Role model: $roleFile\n";

// Update Permission model
$permissionFile = $modelDir . 'Permission.php';
$newPermissionContent = <<<PHP
<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected \$fillable = [
        'name',
        'guard_name',
    ];
}
PHP;
file_put_contents($permissionFile, $newPermissionContent);
echo "Updated Permission model: $permissionFile\n";

// Update RoleSeeder
$roleSeederFile = $seederDir . 'RoleSeeder.php';
$newRoleSeederContent = <<<PHP
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Faker\Generator;

class RoleSeeder extends Seeder
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
    protected \$faker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \$roles = [
            ['name' => 'admin', 'guard_name' => 'sanctum'],
            ['name' => 'teacher', 'guard_name' => 'sanctum'],
            ['name' => 'student', 'guard_name' => 'sanctum'],
            ['name' => 'parent', 'guard_name' => 'sanctum'],
            ['name' => 'staff', 'guard_name' => 'sanctum'],
        ];

        foreach (\$roles as \$role) {
            Role::create(\$role);
        }
    }
}
PHP;
file_put_contents($roleSeederFile, $newRoleSeederContent);
echo "Updated RoleSeeder: $roleSeederFile\n";

// Regenerate autoloader
exec('composer dump-autoload');
echo "Composer autoloader regenerated.\n";

echo "Migration conflict cleanup complete!\n";
