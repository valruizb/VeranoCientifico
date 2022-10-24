<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('c_documento')->truncate();

        DB::table('c_documento')->insert([
            [
                'descripcion' => 'IDENTIFICACIÓN OFICIAL VIGENTE (INE, PASAPORTE, CÉDULA PROFESIONAL)',
                'created_at' => date('Y-m-d H:m:s'),

            ],
            [
                'descripcion' => 'RFC',
                'created_at' => date('Y-m-d H:m:s'),

            ],
            [
                'descripcion' => 'CURP',
                'created_at' => date('Y-m-d H:m:s'),

            ],
            [
                'descripcion' => 'ÚLTIMO COMPROBANTE DE ESTUDIOS',
                'created_at' => date('Y-m-d H:m:s'),
            ],
            [
                'descripcion' => 'ACTA DE NACIMIENTO',
                'created_at' => date('Y-m-d H:m:s'),
            ],
            [
                'descripcion' => 'CURRÍCULUM VITAE CON FOTOGRAFÍA Y FIRMA',
                'created_at' => date('Y-m-d H:m:s'),
            ],
            [
                'descripcion' => 'COMPROBANTE DE DOMICILIO (AGUA, PREDIO, LUZ)',
                'created_at' => date('Y-m-d H:m:s'),
            ],
            [
                'descripcion' => 'CARTILLA DEL SERVICIO MILITAR',
                'created_at' => date('Y-m-d H:m:s'),
            ],

        ]);
    }
}
