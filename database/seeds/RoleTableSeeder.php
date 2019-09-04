<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
       /* $role = new Role();
        $role->nombre = 'admin';
        $role->descripcion = 'Administrator';
        $role->save();
        $role = new Role();
        $role->nombre = 'user';
        $role->descripcion = 'User';
        $role->save();*/

         $role = new Role();
        $role->nombre = 'Administrator Sala';
        $role->descripcion = 'AdminSala';
        $role->save();
    }
}
