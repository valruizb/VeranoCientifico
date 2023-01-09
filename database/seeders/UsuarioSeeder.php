<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; //se importa de SPATIE
use Validator;


class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre' => 'Vitervo', 
            'apellidop' => 'López', 
            'apellidom' => 'Caballero', 
            'tipouser' => '1', 
            'correo' => 'vitervo@gmail.com',
            'correocon' => 'vitervo@gmail.com',
            'telefono' => '7772341881',
            'institution_id' => 2,
            'password' => Hash::make('Password'),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Enrique', 
            'apellidop' => 'Hernandez', 
            'apellidom' => 'Gomez', 
            'tipouser' => '2', 
            'correo' => 'kike@gmail.com',
            'correocon' => 'kike@gmail.com',
            'telefono' => '7773415872',
            'institution_id' => 5,
            'password' => Hash::make('Password'),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Valeria', 
            'apellidop' => 'Ruiz', 
            'apellidom' => 'Bermudez', 
            'tipouser' => '3', 
            'correo' => 'vale@gmail.com',
            'correocon' => 'vale@gmail.com',
            'telefono' => '7773415882',
            'institution_id' => 9,
            'password' => Hash::make('Password'),
        ]);
        //DB::table('users')->insert(['nombre' => 'Noé Castro Sánchez', 'tipouser' => '1', 'correo' => 'noe@gmail.com', 'password' => Hash::make('Password'),]);

        // ROLES POR DEFAULT
        $adm = Role::create(['name' => 'Administrador', 'description' => 'Administrador']);
        $prof = Role::create(['name' => 'Profesor', 'description' => 'Gestiona los proyectos']);
        $rev = Role::create(['name' => 'Revisor Institucional', 'description' => 'Revisa los expedientes de los alumnos']);
        $alumn = Role::create(['name' => 'Alumno', 'description' => 'Busca proyectos de su interes']);

        // Asignar ROLES a usuarios
       User::find(1)->assignRole($adm);
        User::find(2)->assignRole($prof);
        //User::find(2)->assignRole($alumn);
    }
}
