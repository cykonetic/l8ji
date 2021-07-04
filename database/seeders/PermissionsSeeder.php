<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'organization_view',
            'organization_edit',
            'department_list',
            'department_view',
            'department_create',
            'department_edit',
            'department_delete',
            'location_list',
            'location_view',
            'location_create',
            'location_edit',
            'location_delete',
        ];

        foreach ($permissions as $permissionName) {
            Permission::create(['name' => $permissionName]);
        }

        $roles = [
            'Super',
            'Employee',
            'HealthcareProvider',
            'Administrator'
        ];

        foreach ($roles as $roleName) {
            $role = Role::create(['name' => $roleName]);

            // Add permissions to every role
            $anyPermissions = [
                'organization_view',
                'department_list',
                'department_view',
                'location_list',
                'location_view',
            ];

            foreach ($anyPermissions as $permissionName) {
                $role->givePermissionTo(Permission::findByName($permissionName));
            }

            // Add permissions to roles
            // NOTE: Super bypasses all permission checks
            // NOTE: Individual users can be given specific permissions
            if ('HealthcareProvider' === $roleName) {
            } elseif ('Administrator' === $roleName) {
                $adminPermissions = [
                    'organization_edit',
                    'department_create',
                    'department_edit',
                    'department_delete',
                    'location_create',
                    'location_edit',
                    'location_delete',
                ];

                foreach ($adminPermissions as $permissionName) {
                    $role->givePermissionTo(Permission::findByName($permissionName));
                }
            }
        }
    }
}
