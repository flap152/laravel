<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        $admin = Role::create(['name' => config('access.users.admin_role')]);
        $executive = Role::create(['name' => 'executive']);
        $user = Role::create(['name' => config('access.users.default_role')]);
        $app_admin = Role::create(['name' => 'application admin']);

        // Create Permissions
        $perm_list = array('view backend', 'confirm users', 'manage users','view users','manage roles','authorize users');
        foreach ($perm_list as $perm) {
            Permission::create(['name' => $perm]);
        }


        // ALWAYS GIVE ADMIN ROLE ALL PERMISSIONS
        $admin->givePermissionTo($perm_list);

        // Assign Permissions to other Roles
        $executive->givePermissionTo('view backend');

        $app_admin->givePermissionTo(array('view backend', 'confirm users', 'view users','authorize users'));

        $this->enableForeignKeys();
    }
}
