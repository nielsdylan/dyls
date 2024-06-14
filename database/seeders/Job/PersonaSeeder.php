<?php

namespace Database\Seeders\Job;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //1
        DB::table('personas')->insert([
            'apellido_paterno'  => 'QUISPE',
            'apellido_materno'  => 'PERALTA',
            'nro_documento'     => '74250891',
            'documento_id'      => 1,
            'nombres'           => 'NIELS DYLAN',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //2
        DB::table('personas')->insert([
            'apellido_paterno'  => 'VILLA',
            'apellido_materno'  => 'REAL',
            'nro_documento'     => '12345678',
            'documento_id'      => 1,
            'nombres'           => 'JUAN',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //3
        DB::table('personas')->insert([
            'apellido_paterno'  => 'ARMANDO',
            'apellido_materno'  => 'CUTIPA',
            'nro_documento'     => '87654321',
            'documento_id'      => 1,
            'nombres'           => 'DIEGO ROGELIO',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //4
        DB::table('personas')->insert([
            'apellido_paterno'  => 'ROSAS',
            'apellido_materno'  => 'HUALPA',
            'nro_documento'     => '23145678',
            'documento_id'      => 1,
            'nombres'           => 'LUISA SOFIA',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
    }
}
