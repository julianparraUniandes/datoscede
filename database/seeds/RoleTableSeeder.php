<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $role = new Role();
        $role->name = "admin";
        $role->description = "Admininstrador";
        $role->save();

        $role = new Role();
        $role->name = "Profesor Facultad";
        $role->description = "Profesor Facultad";
        $role->save();

        $role = new Role();
        $role->name = "Estudiante Facultad";
        $role->description = "Estudiante Facultad";
        $role->save();
        
        $role = new Role();
        $role->name = "Estudiante";
        $role->description = "Estudiante";
        $role->save();

        $role = new Role();
        $role->name = "Administrativo";
        $role->description = "Personal administrativo";
        $role->save();

        $role = new Role();
        $role->name = "Usuario Externo";
        $role->description = "Usuario Externo";
        $role->save();
    }
}
