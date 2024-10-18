<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Misc
        $miscPermission = Permission::create(['name' => 'N/A']);

        // USER MODEL
        $userPermission1 = Permission::create(['name' => 'create:user']);
        $userPermission2 = Permission::create(['name' => 'show:user']);
        $userPermission3 = Permission::create(['name' => 'update:user']);
        $userPermission4 = Permission::create(['name' => 'delete:user']);

        // ROLE MODEL
        $rolePermission1 = Permission::create(['name' => 'create:role']);
        $rolePermission2 = Permission::create(['name' => 'show:role']);
        $rolePermission3 = Permission::create(['name' => 'update:role']);
        $rolePermission4 = Permission::create(['name' => 'delete:role']);

        // PERMISSION MODEL
        $permission1 = Permission::create(['name' => 'create:permission']);
        $permission2 = Permission::create(['name' => 'show:permission']);
        $permission3 = Permission::create(['name' => 'update:permission']);
        $permission4 = Permission::create(['name' => 'delete:permission']);

        // ADMINS
        $adminPermission1 = Permission::create(['name' => 'create:admin']);
        $adminPermission2 = Permission::create(['name' => 'show:admin']);
        $adminPermission3 = Permission::create(['name' => 'update:admin']);
        $adminPermission4 = Permission::create(['name' => 'delete:admin']);

        // CREATE ROLES
        $userRole = Role::create(['name' => 'user'])->syncPermissions([
            $miscPermission,
        ]);

        $superAdminRole = Role::create(['name' => 'admin'])->syncPermissions([
            $userPermission1,
            $userPermission2,
            $userPermission3,
            $userPermission4,
            $rolePermission1,
            $rolePermission2,
            $rolePermission3,
            $rolePermission4,
            $permission1,
            $permission2,
            $permission3,
            $permission4,
            $adminPermission1,
            $adminPermission2,
            $adminPermission3,
            $adminPermission4,
        ]);
        $memberRole = Role::create(['name' => 'member'])->syncPermissions([
            $userPermission1,
            $userPermission2,
            $userPermission3,
            $userPermission4,
            $adminPermission1,
        ]);
    }
}
