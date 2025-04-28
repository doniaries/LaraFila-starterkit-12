<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Buat roles
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        // Get all permissions
        $permissions = Permission::all();

        // Assign all permissions to super_admin
        $superAdmin->syncPermissions($permissions);

        // Assign specific permissions to admin_opd
        $admin->syncPermissions($permissions->filter(function ($permission) {
            return !str_contains($permission->name, 'role');
        }));
        // Reset cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
