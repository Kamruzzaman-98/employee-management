<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'employee-create']);
        Permission::create(['name' => 'employee-edit']);
        Permission::create(['name' => 'employee-delete']);
        Permission::create(['name' => 'employee-view']);

        Permission::create(['name' => 'leave-approve']);
        Permission::create(['name' => 'leave-reject']);
        Permission::create(['name' => 'leave-view-all']);

        $superAdmin = Role::create(['name' => 'Super Admin']);
        $hr = Role::create(['name' => 'HR']);
        $employee = Role::create(['name' => 'Employee']);

        $hr->givePermissionTo([
            'employee-create',
            'employee-edit',
            'employee-view',
            'leave-approve',
            'leave-reject',
            'leave-view-all'
        ]);

        $employee->givePermissionTo([
            'employee-view'
        ]);
    }
}
