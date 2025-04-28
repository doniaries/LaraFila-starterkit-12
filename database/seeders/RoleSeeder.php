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
        // Reset cache
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat roles
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $user = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);

        // Get all permissions
        $permissions = Permission::all();

        // Assign all permissions to super_admin
        $superAdmin->syncPermissions($permissions);

        // Assign specific permissions to admin
        $adminPermissions = $permissions->filter(function ($permission) {
            return !str_contains($permission->name, 'role') &&
                !str_contains($permission->name, 'permission');
        });
        $admin->syncPermissions($adminPermissions);

        // Assign basic permissions to user
        $userPermissions = $permissions->filter(function ($permission) {
            return (str_contains($permission->name, 'view_') ||
                str_contains($permission->name, 'task')) &&
                !str_contains($permission->name, 'user') &&
                !str_contains($permission->name, 'role') &&
                !str_contains($permission->name, 'permission');
        });
        $user->syncPermissions($userPermissions);

        // Reset cache again
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
