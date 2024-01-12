<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'Admin']);
        $managerRole = Role::create(['name' => 'Manager']);
        $userRole = Role::create(['name' => 'User']);

        // Create permissions
        $editTasksPermission = Permission::create(['name' => 'edit tasks']);
        $viewTasksPermission = Permission::create(['name' => 'view tasks']);
        $updateTasksPermission = Permission::create(['name' => 'update tasks']);
        $deleteTasksPermission = Permission::create(['name' => 'delete tasks']);

        // Attach permissions to roles
        $adminRole->permissions()->attach([$editTasksPermission->id, $viewTasksPermission->id, $updateTasksPermission->id, $deleteTasksPermission->id]);
        $managerRole->permissions()->attach([$editTasksPermission->id, $viewTasksPermission->id]);
        $userRole->permissions()->attach([$viewTasksPermission->id]);
 
    }
}
