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
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'modifier']);
        Permission::create(['name' => 'creer']);
        Permission::create(['name' => 'supprimer']);
        Permission::create(['name' => 'voir']);

       

        $role = Role::create(['name' => 'admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        $user = \App\Models\User::factory()->create([
            'name' => 'Administrateur',
            'email' => 'admin@admin.com',
        ]);
        $user->assignRole($role);

        $user1 = \App\Models\User::factory()->create([
            'name' => 'Super Utilisateur',
            'email' => 'superadmin@superadmin.com',
        ]);
        $user1->assignRole($role);

    
    }
}
