<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_admin = Role::create(['name' => 'admin']);
        $role_editor = Role::create(['name' => 'editor']);

        $permission_create_rol = Permission::create(['name' => 'create roles']);
        $permission_edit_rol = Permission::create(['name' => 'edit roles']);
        $permission_delete_rol = Permission::create(['name' => 'delete roles']);
        $permission_update_rol = Permission::create(['name' => 'update roles']);
        $permission_read_rol = Permission::create(['name' => 'read roles']);
        // $permission_edit_user = Permission::create(['name' => 'edit users']);
        // $permission_delete_user = Permission::create(['name' => 'delete users']);
        // $permission_view_user = Permission::create(['name' => 'view users']);
        $permission_create_lesson = Permission::create(['name' => 'create lessons']);
        $permission_edit_lesson = Permission::create(['name' => 'edit lessons']);
        $permission_delete_lesson = Permission::create(['name' => 'delete lessons']);
        $permission_update_lesson = Permission::create(['name' => 'update lessons']);
        $permission_read_lesson = Permission::create(['name' => 'read lessons']);

        $permission_create_category = Permission::create(['name' => 'create categories']);
        $permission_edit_category = Permission::create(['name' => 'edit categories']);
        $permission_delete_category = Permission::create(['name' => 'delete categories']);
        $permission_update_category = Permission::create(['name' => 'update categories']);
        $permission_read_category = Permission::create(['name' => 'read categories']);

        $permission_create_level = Permission::create(['name' => 'create levels']);
        $permission_edit_level = Permission::create(['name' => 'edit levels']);
        $permission_delete_level = Permission::create(['name' => 'delete levels']);
        $permission_update_level = Permission::create(['name' => 'update levels']);
        $permission_read_level = Permission::create(['name' => 'read levels']);
        $permission_admin = [$permission_create_rol, $permission_edit_rol, $permission_delete_rol, $permission_update_rol, $permission_read_rol, $permission_create_lesson, $permission_edit_lesson, $permission_delete_lesson, $permission_update_lesson, $permission_read_lesson, $permission_create_category, $permission_edit_category, $permission_delete_category, $permission_update_category, $permission_read_category, $permission_create_level, $permission_edit_level, $permission_delete_level, $permission_update_level, $permission_read_level];
        $permission_editor = [$permission_create_lesson, $permission_edit_lesson, $permission_delete_lesson, $permission_update_lesson, $permission_read_lesson, $permission_create_category, $permission_edit_category, $permission_delete_category, $permission_update_category, $permission_read_category, $permission_create_level, $permission_edit_level, $permission_delete_level, $permission_update_level, $permission_read_level];
        $role_admin->givePermissionTo($permission_admin);
        $role_editor->givePermissionTo($permission_editor);
        // Si el rol ya tiene permisos A y B
// $role->givePermissionTo('C'); // Ahora tiene A, B y C
// $role->syncPermissions(['C']); // Ahora SOLO tiene C, eliminó A y B
    }
}
