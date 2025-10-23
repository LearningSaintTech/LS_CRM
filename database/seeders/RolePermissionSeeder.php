<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Define permissions
        $permissions = [
            'menu.view',
            'menu.create',
            'menu.edit',
            'menu.delete',
            'user.manage',
            'role.manage'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $subAdmin = Role::firstOrCreate(['name' => 'sub-admin']);
        $vendor = Role::firstOrCreate(['name' => 'vendor']);

        // Assign permissions
        $admin->syncPermissions(Permission::all());
        $subAdmin->syncPermissions(['menu.view','menu.edit']);
        $vendor->syncPermissions(['menu.view']);
    }
}
