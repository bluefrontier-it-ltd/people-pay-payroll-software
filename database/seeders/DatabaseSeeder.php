<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Set default roles and permissions

        $permissions = [
            'CRUD ACMs',
            'CRUD Subbies',
            'CRUD Clients',
            'CRUD Client Users',
            'View ACM Dashboard',
            'View Client Dashboard',
            'View Subbie Dashboard',
            'View Reporting',
            'View audit log',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin = Role::create(['name' => 'Admin']);

        $adminPermissions = [
            'CRUD ACMs',
            'CRUD Subbies',
            'CRUD Clients',
            'CRUD Client Users',
            'View ACM Dashboard',
            'View Client Dashboard',
            'View Subbie Dashboard',
            'View Reporting',
            'View audit log',
        ];
        $admin->givePermissionTo($adminPermissions);

        $acm = Role::create(['name' => 'Account Manager (ACM)']);

        $acmPermissions = [
            'CRUD Client Users',
            'View ACM Dashboard',
            'View Reporting',
        ];
        $acm->givePermissionTo($acmPermissions);

        $subby = Role::create(['name' => 'Subby']);
        $subbyPermissions = [
            'View Subbie Dashboard',
        ];
        $subby->givePermissionTo($subbyPermissions);

        $hr = Role::create(['name' => 'Hr']);

        $hrPermissions = [
            'View Client Dashboard',
            'View Reporting',
        ];
        $hr->givePermissionTo($hrPermissions);

        $finance = Role::create(['name' => 'Finance']);

        $financePermissions = [
            'View Reporting',
        ];
        $finance->givePermissionTo($financePermissions);

        //Make dummy Admin,acm,subby,hr and finance users

        $users = [
            ['name' => 'Admin', 'email' => 'admin@profile.com', 'password' => Hash::make('Admin')],
            ['name' => 'ACM', 'email' => 'acm@profile.com', 'password' => Hash::make('ACM')],
            ['name' => 'Subby', 'email' => 'subby@profile.com', 'password' => Hash::make('Subby')],
            ['name' => 'Hr', 'email' => 'hr@profile.com', 'password' => Hash::make('Hr')],
            ['name' => 'Finance', 'email' => 'finance@profile.com', 'password' => Hash::make('Finance')],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
            ]);

            switch ($userData['name']) {
                case 'Admin':
                    $user->assignRole('Admin');
                    break;
                case 'ACM':
                    $user->assignRole('Account Manager (ACM)');
                    break;
                case 'Subby':
                    $user->assignRole('Subby');
                    break;
                case 'Hr':
                    $user->assignRole('Hr');
                    break;
                case 'Finance':
                    $user->assignRole('Finance');
                    break;
            }
        }
    }
}
