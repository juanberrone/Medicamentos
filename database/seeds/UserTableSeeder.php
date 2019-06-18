<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    public function run()
    {
        $role_user = Role::where('nombre', 'user')->first();
        $role_admin = Role::where('nombre', 'admin')->first();
        $user = new User();
        $user->name = 'Juan';
        $user->email = 'jmberrone@gmail.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);
        $user = new User();
        $user->name = 'Lourdes';
        $user->email = 'Lourdes@gmail.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);
     }
}
