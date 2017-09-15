<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use App\Models\Access\Role\Role;
use App\Models\Access\Permission\Permission;
use Database\DisableForeignKeys;

/**
 * Class PermissionRoleSeeder.
 */
class PermissionRoleSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate(config('access.permission_role_table'));

        /*
         * Assign view backend to executive role as example
         */
        Role::find(2)->permissions()->sync([1]);

        /*
         * Assign permissions  to App Admin role as example
         */
        $cu =  Permission::where(['name'=>'confirm-users'])->first();
        $vu =  Permission::where(['name'=>'view-users'])->first();
        $vb =  Permission::where(['name'=>'view-backend'])->first();
        $ro = Role::where(['name'=>'AppAdmin'])->first();
            $ro->permissions()->sync( [$cu->id,$vu->id,$vb->id]);

        $this->enableForeignKeys();
    }
}
