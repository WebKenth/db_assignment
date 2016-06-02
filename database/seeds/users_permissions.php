<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;
use App\Permission;

class users_permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;
        $role->id = 2;
        $role->name = 'user';
        $role->label = 'User';
        $role->save();

        $permission = new Permission;
        $permission->id = 2;
        $permission->name = 'statistics';
        $permission->label = 'Stats Guy, You can view Stats..';
        $permission->save();

        $role->addPermission($permission);

        $role = new Role;
        $role->id = 1;
        $role->name = 'admin';
        $role->label = 'Administrator';
        $role->save();

        $permission = new Permission;
        $permission->id = 1;
        $permission->name = 'awesome';
        $permission->label = 'Awesome, Can do Anything';
        $permission->save();

        $role->addPermission($permission);

        $user = new User;
        $user->id       = 1;
        $user->name     = 'Martin Knudsen';
        $user->email    = 'admin@webkenth.dk';
        $user->password = bcrypt('password');
        $user->save();
        $user->addRole($role);

        $user = new User;
        $user->id       = 2;
        $user->name     = 'Morten Skøtt Gregersen';
        $user->email    = 'mooorten@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->addRole($role);

        $user = new User;
        $user->id       = 3;
        $user->name     = 'Admin';
        $user->email    = 'admin@admin.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->addRole($role);

    }
}
