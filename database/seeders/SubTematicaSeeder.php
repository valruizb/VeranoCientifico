<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SubTematicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('subtematica')->insert([['name' => 'Astrofísica',  'id_tematica' => '1']]);
        DB::table('subtematica')->insert(['name' => 'Astronomía',  'id_tematica' => '1']);
        DB::table('subtematica')->insert(['name' => 'Ciencias de la Tierra y del espacio',  'id_tematica' => '1']);
        DB::table('subtematica')->insert(['name' => 'Física',  'id_tematica' => '1']);
        DB::table('subtematica')->insert(['name' => 'Lógica',  'id_tematica' => '1']);
        DB::table('subtematica')->insert(['name' => 'Matemáticas',  'id_tematica' => '1']);
        DB::table('subtematica')->insert(['name' => 'Prospectiva',  'id_tematica' => '1']);
        DB::table('subtematica')->insert(['name' => 'Ciencias del mar',  'id_tematica' => '1']);

        DB::table('subtematica')->insert(['name' => 'Ciencias de la vida',  'id_tematica' => '2']);
        DB::table('subtematica')->insert(['name' => 'Prospectiva',  'id_tematica' => '2']);
        DB::table('subtematica')->insert(['name' => 'Ciencias biomédicas',  'id_tematica' => '2']);
        DB::table('subtematica')->insert(['name' => 'Biología',  'id_tematica' => '2']);
        DB::table('subtematica')->insert(['name' => 'Química',  'id_tematica' => '2']);
        DB::table('subtematica')->insert(['name' => 'Ciencias Ambientales',  'id_tematica' => '2']);

        DB::table('subtematica')->insert(['name' => 'Ciencias médicas',  'id_tematica' => '3']);
        DB::table('subtematica')->insert(['name' => 'Medicina',  'id_tematica' => '3']);
        DB::table('subtematica')->insert(['name' => 'Enfermería',  'id_tematica' => '3']);
        DB::table('subtematica')->insert(['name' => 'Ingeniería biomédica',  'id_tematica' => '3']);
        DB::table('subtematica')->insert(['name' => 'Especialidad médica',  'id_tematica' => '3']);
        DB::table('subtematica')->insert(['name' => 'Odontología',  'id_tematica' => '3']);
        DB::table('subtematica')->insert(['name' => 'Investigación médica',  'id_tematica' => '3']);

        DB::table('subtematica')->insert(['name' => 'Biotecnología',  'id_tematica' => '4']);
        DB::table('subtematica')->insert(['name' => 'Ciencias agrarías',  'id_tematica' => '4']);
        DB::table('subtematica')->insert(['name' => 'Biotecnología agrícola',  'id_tematica' => '4']);
        DB::table('subtematica')->insert(['name' => 'Salud y Producción Animal',  'id_tematica' => '4']);
        DB::table('subtematica')->insert(['name' => 'Pesca',  'id_tematica' => '4']);

        DB::table('subtematica')->insert(['name' => 'Robótica',  'id_tematica' => '5']);
        DB::table('subtematica')->insert(['name' => 'Simulaciones',  'id_tematica' => '5']);
        DB::table('subtematica')->insert(['name' => 'Materiales avanzados',  'id_tematica' => '5']);
        DB::table('subtematica')->insert(['name' => 'Realidad virtual',  'id_tematica' => '5']);
        DB::table('subtematica')->insert(['name' => 'Realidad Aumentada',  'id_tematica' => '5']);
        DB::table('subtematica')->insert(['name' => 'Big Data',  'id_tematica' => '5']);
        DB::table('subtematica')->insert(['name' => 'Inteligencia artificial',  'id_tematica' => '5']);
        DB::table('subtematica')->insert(['name' => 'Software como servicio',  'id_tematica' => '5']);
        DB::table('subtematica')->insert(['name' => 'Manufactura aditiva',  'id_tematica' => '5']);

        DB::table('subtematica')->insert(['name' => 'Ciencias tecnologícas',  'id_tematica' => '6']);
        DB::table('subtematica')->insert(['name' => 'Ingeniería',  'id_tematica' => '6']);
        DB::table('subtematica')->insert(['name' => 'Prospectiva',  'id_tematica' => '6']);

        DB::table('subtematica')->insert(['name' => 'Ciencia política',  'id_tematica' => '7']);
        DB::table('subtematica')->insert(['name' => 'Ciencias de la educación',  'id_tematica' => '7']);
        DB::table('subtematica')->insert(['name' => 'Ciencias económicas',  'id_tematica' => '7']);
        DB::table('subtematica')->insert(['name' => 'Ciencias jurídicas y Derecho',  'id_tematica' => '7']);
        DB::table('subtematica')->insert(['name' => 'Demografía',  'id_tematica' => '7']);
        DB::table('subtematica')->insert(['name' => 'Formación docente',  'id_tematica' => '7']);
        DB::table('subtematica')->insert(['name' => 'Geografía',  'id_tematica' => '7']);
        DB::table('subtematica')->insert(['name' => 'Historia',  'id_tematica' => '7']);
        DB::table('subtematica')->insert(['name' => 'Sociología',  'id_tematica' => '7']);
        DB::table('subtematica')->insert(['name' => 'Administración y negocios',  'id_tematica' => '7']);
        DB::table('subtematica')->insert(['name' => 'Medios de comunicación y comunicaciones',  'id_tematica' => '7']);
        DB::table('subtematica')->insert(['name' => 'Comunicación científica',  'id_tematica' => '7']);
        DB::table('subtematica')->insert(['name' => 'Gestión',  'id_tematica' => '7']);
        DB::table('subtematica')->insert(['name' => 'Estudios de Género',  'id_tematica' => '7']);
    }
}
