<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TematicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thematics')->insert(['name' => '1.-Física, Matemáticas y Ciencias']);
        DB::table('thematics')->insert(['name' => '2.-Biología y Química']);
        DB::table('thematics')->insert(['name' => '3.-Medicina y Salud']);
        DB::table('thematics')->insert(['name' => '4.-Biotecnología y Ciencias Agropecuarias']);
        DB::table('thematics')->insert(['name' => '5.-Tecnología 4.0 ']);
        DB::table('thematics')->insert(['name' => '6.-Ingeniería e Industria']);
        DB::table('thematics')->insert(['name' => '7.-Ciencias sociales']);
    }
}
