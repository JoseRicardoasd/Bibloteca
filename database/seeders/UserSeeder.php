<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class  UserSeeder  extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //creacion del usuario admin
       User::create([
        'name'=>'administrador',
        'email'=>'admin@gmail.com',
        'password'=>'1234',

       ])->assignRole('admin');



    }

}




