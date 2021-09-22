<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesandPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          //Seed the default roles
          $roles = array(
            'superadmin',
            'admin',
            'volunteer',
            'user',
          );

          // Seed the default permissions
          $permissions = array(
            'full-administration',
            'manage-users',
            'manage-trees',
            'manage-settings',
            'manage-announcements',
            'basic-user'
          );




          foreach ($permissions as $perms) {
              Permission::firstOrCreate(['name' => $perms]);
              $this->command->warn("Permission: $perms created.");
          }

          foreach ($roles as $role) {

            $role = Role::firstOrCreate(['name' => trim($role)]);
            $this->command->warn("Role: $role->name created.");

            if($role->name == 'superadmin' ) {
                // assign all permissions
                $role->syncPermissions(Permission::all());
                $this->command->info('SUPER ADMIN: Created, granted all the permissions');

            }

            elseif($role->name == 'admin' ) {
              $role->syncPermissions(Permission::whereIn('name', ['manage-users', 'manage-trees', 'manage-announcements'])->get());
              $this->command->info('ADMIN: Created, granted required permissions');
            }

            elseif($role->name == 'volunteer' ) {
                $role->syncPermissions(Permission::whereIn('name', ['manage-trees'])->get());
                $this->command->info('VOLUNTEER: Created, granted finances and basic-user permissions');
              }

            else {
                // for others by default only read access
                $role->syncPermissions(Permission::where('name', 'basic-user')->get());
                $this->command->info($role->name.': Created, granted basic-user permissions');
            }
          }

          $this->command->info('SUCCESS! All roles and permissions seeded');

          // Confirm roles needed

          // This should be done ONLY in local environment

          if(env('APP_ENV') == 'local') {
            if ($this->command->confirm('Do you wish to grant administrator access to all seeded users?', true)) {
                $users = User::all();
                foreach($users as $user) {
                  $user->assignRole('superadmin');
                  $this->command->info("SUPER ADMIN: Access granted for $user->name.");
                }
            } else {
                $users = User::all();
                foreach($users as $user) {
                  $user->assignRole('user');
                  $this->command->info("USER: Access granted for $user->name.");
                }
            }
          } else {
            $this->command->error('Error: not in LOCAL environment, unable to assign any roles to users');
          }
    }
}
