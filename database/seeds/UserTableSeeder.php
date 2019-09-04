<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    public function run()
    {
      /*  $role_user = Role::where('nombre', 'user')->first();
        $role_admin = Role::where('nombre', 'admin')->first();
        $user = new User();

        $user->dni = '31941810';
        $user->name = 'Juan';
        $user->email = 'jmberrone@gmail.com';
        $user->password = bcrypt('hola');
        $user->save();
        $user->roles()->attach($role_user);
        $user = new User();

        $user->dni = '31992375s';
        $user->name = 'Lourdes';
        $user->email = 'Lourdes@gmail.com';  CAMPAGNA, Edith
        $user->password = bcrypt('hola');
        $user->save();
        $user->roles()->attach($role_admin);*/

         $user = new User();

        $role_adminSala = Role::where('nombre', 'admin')->first();

        $user->dni = '20333444';
        $user->name = ' CAMPAGNA, Edith ';
        $user->email = 'campagna@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_adminSala);


        
       

     }
}
