<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConvocatoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('c_convocatoria')->truncate();

        DB::table('c_convocatoria')->insert([
            [
                'nombre' => 'Investigación en Ciencia de Frontera 2022',
                'num_convocatoria'=>'2022_1',
                'ejercicio'=>'2022',
                'status'=>'Vigente',
                'created_at' => date('Y-m-d H:m:s'),
               
            ],
            [
                'nombre' => 'Investigación en Ciencia de Frontera 2023',
                'num_convocatoria' => '2023_1',
                'ejercicio' => '2022',
                'status' => 'Próxima',
                'created_at' => date('Y-m-d H:m:s'),
             
            ],

        ]);

    }
}
