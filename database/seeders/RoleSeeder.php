<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //roles y permisos
        $administrador = Role::create(['name'=>'admin']);
        $usuarios= Role::create(['name'=>'usuario']);


        permission::create(['name'=>'admin.home'])->syncRoles([$administrador, $usuarios]);

        permission::create(['name'=>'admin.añadirlibro.index'])->assignRole([$administrador]);
        permission::create(['name'=>'admin.añadirlibro.crear'])->assignRole([$administrador]);
        permission::create(['name'=>'admin.añadirlibro.editar'])->assignRole([$administrador]);
        permission::create(['name'=>'admin.añadirlibro.eliminar'])->assignRole([$administrador]);

        permission::create(['name'=>'admin.añadirusuario.index'])->assignRole([$administrador]);
        permission::create(['name'=>'admin.añadirusuario.crear'])->assignRole([$administrador]);
        permission::create(['name'=>'admin.añadirusuario.editar'])->assignRole([$administrador]);
        permission::create(['name'=>'admin.añadirusuario.eliminar'])->assignRole([$administrador]);

        permission::create(['name'=>'admin.prestamo.index'])->assignRole([$administrador]);
        permission::create(['name'=>'admin.prestamo.crear'])->assignRole([$administrador]);
        permission::create(['name'=>'admin.prestamo.editar'])->assignRole([$administrador]);
        permission::create(['name'=>'admin.prestamo.eliminar'])->assignRole([$administrador]);

    }
}
