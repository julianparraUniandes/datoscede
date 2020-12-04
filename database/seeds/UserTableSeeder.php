<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_user = Role::where('name','Profesor Facultad')->first();
        $role_admin = Role::where('name','admin')->first();

        $user = new User();
        $user->name = "User";
        $user->lastName = "lastname";
        $user->email = "user@mail.com";
        $user->password = bcrypt('query');
        $user->phone = "123456789";
        $user->adress = "calle 1 No 2 - 20";
        $user->company = "Universidad";
        $user->companyKind = "Universidad - Profesor/Investigador";
        $user->country = "Colombia";
        $user->depto = "Cundinamarca";
        $user->city = "Bogotá";
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = "Admin";
        $user->lastName = "lastname";
        $user->email = "Admin@asmmeas22h2322.com";
        $user->password = bcrypt('gpE$ggM1mmR0*');
        $user->phone = "123456789";
        $user->adress = "calle 1 No 2 - 20";
        $user->company = "Universidad";
        $user->companyKind = "Universidad - Profesor/Investigador";
        $user->country = "Colombia";
        $user->depto = "Cundinamarca";
        $user->city = "Bogotá";
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
