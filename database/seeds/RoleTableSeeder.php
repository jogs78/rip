<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'rip';       
        $role->save();        

        $role = new Role();
        $role->name = 'recursos';       
        $role->save();

        $role = new Role();
        $role->name = 'supervisor';       
        $role->save();

        $role = new Role();
        $role->name = 'beneficiario';       
        $role->save();
    }
}
