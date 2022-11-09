<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CREAMOS LO MÓDULOS DEL SISTEMA
        Permission::create(['name' => 'modulo.catalogos', 'guard_name' => 'web', 'description' => 'Catálogos del Sistema', 'module_key' => 'modulo']);
        Permission::create(['name' => 'modulo.profesores', 'guard_name' => 'web', 'description' => 'Profesores', 'module_key' => 'modulo']);
        Permission::create(['name' => 'modulo.seguridad', 'guard_name' => 'web', 'description' => 'Administración de Seguridad', 'module_key' => 'modulo']);


        Permission::create(['name' => 'modulo.index', 'guard_name' => 'web', 'description' => 'Leer Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'modulo.store', 'guard_name' => 'web', 'description' => 'Crear Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'modulo.update', 'guard_name' => 'web', 'description' => 'Actualizar Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'modulo.delete', 'guard_name' => 'web', 'description' => 'Eliminar Registros', 'module_key' => 'cat']);

        Permission::create(['name' => 'permissions.index', 'guard_name' => 'web', 'description' => 'Leer Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'permissions.store', 'guard_name' => 'web', 'description' => 'Crear Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'permissions.update', 'guard_name' => 'web', 'description' => 'Actualizar Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'permissions.delete', 'guard_name' => 'web', 'description' => 'Eliminar Registros', 'module_key' => 'cat']);

        Permission::create(['name' => 'perfiles.index', 'guard_name' => 'web', 'description' => 'Leer Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'perfiles.store', 'guard_name' => 'web', 'description' => 'Crear Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'perfiles.update', 'guard_name' => 'web', 'description' => 'Actualizar Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'perfiles.delete', 'guard_name' => 'web', 'description' => 'Eliminar Registros', 'module_key' => 'cat']);

        Permission::create(['name' => 'usuarios.index', 'guard_name' => 'web', 'description' => 'Leer Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'usuarios.store', 'guard_name' => 'web', 'description' => 'Crear Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'usuarios.update', 'guard_name' => 'web', 'description' => 'Actualizar Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'usuarios.delete', 'guard_name' => 'web', 'description' => 'Eliminar Registros', 'module_key' => 'cat']);

        Permission::create(['name' => 'convocatoria.index', 'guard_name' => 'web', 'description' => 'Leer Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'convocatoria.store', 'guard_name' => 'web', 'description' => 'Crear Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'convocatoria.update', 'guard_name' => 'web', 'description' => 'Actualizar Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'convocatoria.delete', 'guard_name' => 'web', 'description' => 'Eliminar Registros', 'module_key' => 'cat']);
        

        Permission::create(['name' => 'evento.index', 'guard_name' => 'web', 'description' => 'Leer Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'evento.store', 'guard_name' => 'web', 'description' => 'Crear Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'evento.update', 'guard_name' => 'web', 'description' => 'Actualizar Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'evento.delete', 'guard_name' => 'web', 'description' => 'Eliminar Registros', 'module_key' => 'cat']);

        Permission::create(['name' => 'calendario.index', 'guard_name' => 'web', 'description' => 'Leer Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'calendario.store', 'guard_name' => 'web', 'description' => 'Crear Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'calendario.update', 'guard_name' => 'web', 'description' => 'Actualizar Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'calendario.delete', 'guard_name' => 'web', 'description' => 'Eliminar Registros', 'module_key' => 'cat']);

        Permission::create(['name' => 'documento.index', 'guard_name' => 'web', 'description' => 'Leer Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'documento.store', 'guard_name' => 'web', 'description' => 'Crear Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'documento.update', 'guard_name' => 'web', 'description' => 'Actualizar Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'documento.delete', 'guard_name' => 'web', 'description' => 'Eliminar Registros', 'module_key' => 'cat']);

        Permission::create(['name' => 'proyectos.index', 'guard_name' => 'web', 'description' => 'Leer Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'proyectos.store', 'guard_name' => 'web', 'description' => 'Leer Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'proyectos.update', 'guard_name' => 'web', 'description' => 'Leer Registros', 'module_key' => 'cat']);
        Permission::create(['name' => 'proyectos.delete', 'guard_name' => 'web', 'description' => 'Leer Registros', 'module_key' => 'cat']);

    }
}
