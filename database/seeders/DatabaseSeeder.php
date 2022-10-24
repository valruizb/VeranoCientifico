<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsuarioSeeder::class,
            ModuloSeeder::class,
            PermisosSeeder::class,
            AdminSeeder::class,
            ConvocatoriaSeeder::class,
            EventoSeeder::class,
            CalendarioConvocatoriaSeeder::class,
            DocumentoSeeder::class,
            SubTematicaSeeder::class, 
            TematicaSeeder::class,
            InstitucionesSeeder::CLass,
        ]);
    }
}
