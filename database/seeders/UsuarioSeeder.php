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
            'name' => 'Vitervo', 
            'lastnamep' => 'López', 
            'lastnamem' => 'Caballero', 
            'rol' => '1', 
            'email' => 'vitervo@gmail.com',
            'emailcon' => 'vitervo@gmail.com',
            'phone' => '7772341881',
            'institution_id' => 2,
            'password' => Hash::make('Password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Enrique', 
            'lastnamep' => 'Hernandez', 
            'lastnamem' => 'Gomez', 
            'rol' => '2', 
            'email' => 'kike@gmail.com',
            'emailcon' => 'kike@gmail.com',
            'phone' => '7773415872',
            'institution_id' => 5,
            'password' => Hash::make('Password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Enrique', 
            'lastnamep' => 'Hernandez', 
            'lastnamem' => 'Gomez', 
            'rol' => '3', 
            'email' => 'kike12@gmail.com',
            'emailcon' => 'kike12@gmail.com',
            'phone' => '7773415872',
            'institution_id' => 5,
            'password' => Hash::make('Password'),
        ]);

        DB::table('users')->insert([
            'name' => 'Valeria', 
            'lastnamep' => 'Ruiz', 
            'lastnamem' => 'Bermudez', 
            'rol' => '4', 
            'email' => 'kike12332@gmail.com',
            'emailcon' => 'kike12332@gmail.com',
            'phone' => '7773415872',
            'institution_id' => 5,
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
        User::find(3)->assignRole($rev);
        User::find(4)->assignRole($alumn);
        //User::find(2)->assignRole($alumn);
    }
}
