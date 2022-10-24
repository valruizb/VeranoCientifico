<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('c_evento')->truncate();

        DB::table('c_evento')->insert([
            [
                'nombre' => 'Publicación de Convocatoria',
                'created_at' => date('Y-m-d H:m:s'),

            ],
            [
                'nombre' => 'Recepción de postulantes',
                'created_at' => date('Y-m-d H:m:s'),

            ],
            [
                'nombre' => 'Asignación de Evaluadores',
                'created_at' => date('Y-m-d H:m:s'),

            ],
            [
                'nombre' => 'Evaluación',
                'created_at' => date('Y-m-d H:m:s'),
            ],
            [
                'nombre' => 'Publicación de Resultados y Cierre',
                'created_at' => date('Y-m-d H:m:s'),
            ],

        ]);
    }
}
