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
         $role_rip = Role::where('name', 'rip')->first();
        $role_recurso = Role::where('name', 'recursos')->first();
        $role_super = Role::where('name', 'supervisor')->first();
        $role_benefi = Role::where('name', 'beneficiario')->first();    

        $user = new User();
        $user->name = 'Jorge Octavio';
        $user->email = 'prodep@ittg.mx';
        $user->password = bcrypt('prodep2019');
        $user->apellido_paterno = 'Guzmán';
        $user->apellido_materno = 'Sánchez';        
        $user->save();
        $user->roles()->attach($role_rip);        

        $user = new User();
        $user->name = 'recursos';
        $user->email = 'recursos@ittg.mx';
        $user->password = bcrypt('prodep2019');
        $user->apellido_paterno = 'Paterno';
        $user->apellido_materno = 'Materno';        
        $user->save();
        $user->roles()->attach($role_recurso);

        $user = new User();
        $user->name = 'Supervisor';
        $user->email = 'supervisor@ittg.mx';
        $user->password = bcrypt('prodep2019');
        $user->apellido_paterno = 'Paterno';
        $user->apellido_materno = 'Materno';        
        $user->save();
        $user->roles()->attach($role_super);

        $user = new User();
        $user->name = 'beneficiario';
        $user->email = 'beneficiario@ittg.mx';
        $user->apellido_paterno = 'Paterno';
        $user->apellido_materno = 'Materno';        
        $user->password = bcrypt('prodep2019');
        $user->save();
        $user->roles()->attach($role_benefi);
    }
}
