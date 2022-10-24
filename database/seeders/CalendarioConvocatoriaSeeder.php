<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalendarioConvocatoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('c_calendario')->truncate();

        DB::table('c_calendario')->insert([
            [
                'id_convocatoria' => 1,
                'id_evento' => 1,
                'fec_inicio' => '2022/01/01',
                'fec_fin' => '2022/01/31',
                'comentario' => 'Publicación de Convocatoria',
                'created_at' => date('Y-m-d H:m:s'),
            ],
            [
                'id_convocatoria' => 1,
                'id_evento' => 2,
                'fec_inicio' => '2022/02/01',
                'fec_fin' => '2022/03/31',
                'comentario' => 'Recepción de Postulantes',
                'created_at' => date('Y-m-d H:m:s'),

            ],
            [
                'id_convocatoria' => 1,
                'id_evento' => 3,
                'fec_inicio' => '2022/04/01',
                'fec_fin' => '2022/04/30',
                'comentario' => 'Asignación de Evaluadores',
                'created_at' => date('Y-m-d H:m:s'),

            ],
            [
                'id_convocatoria' => 1,
                'id_evento' => 4,
                'fec_inicio' => '2022/05/01',
                'fec_fin' => '2022/06/30',
                'comentario' => 'Evaluación',
                'created_at' => date('Y-m-d H:m:s'),

            ],
            [
                'id_convocatoria' => 1,
                'id_evento' => 5,
                'fec_inicio' => '2022/07/01',
                'fec_fin' => '2022/07/31',
                'comentario' => 'Publicación de Resultados y Cierre',
                'created_at' => date('Y-m-d H:m:s'),

            ],

        ]);
    }
}
