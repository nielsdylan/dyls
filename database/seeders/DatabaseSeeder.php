<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Job\AlquilerSeeder;
use Database\Seeders\Job\CategoriaSeeder;
use Database\Seeders\Job\ClienteSeeder;
use Database\Seeders\Job\EstadoSeeder;
use Database\Seeders\Job\HabitacionSeeder;
use Database\Seeders\Job\NivelSeeder;
use Database\Seeders\Job\PersonaSeeder;
use Database\Seeders\Job\TarifaSeeder;
use Database\Seeders\Job\TipoDocumentoSeeder;
use Database\Seeders\Job\UsuarioSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UsuarioSeeder::class,
            EstadoSeeder::class,
            NivelSeeder::class,
            CategoriaSeeder::class,
            TarifaSeeder::class,
            HabitacionSeeder::class,
            PersonaSeeder::class,
            ClienteSeeder::class,
            TipoDocumentoSeeder::class,
            AlquilerSeeder::class,

        ]);
    }
}
