<?php

namespace Database\Seeders\Job;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //1
        DB::table('habitaciones')->insert([
            'nombre'    => '201',
            'nivel_id'  => 2,
            'categoria_id'  => 1,
            'tarifa_id'  => 5,
            'precio'  => 50,
            'descripcion'  => '...',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //1
        DB::table('habitaciones')->insert([
            'nombre'    => '202',
            'nivel_id'  => 2,
            'categoria_id'  => 2,
            'tarifa_id'  => 5,
            'precio'  => 50,
            'descripcion'  => '...',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //1
        DB::table('habitaciones')->insert([
            'nombre'    => '203',
            'nivel_id'  => 2,
            'categoria_id'  => 3,
            'tarifa_id'  => 5,
            'precio'  => 50,
            'descripcion'  => '...',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);

        DB::table('habitaciones')->insert([
            'nombre'    => '301',
            'nivel_id'  => 3,
            'categoria_id'  => 1,
            'tarifa_id'  => 5,
            'precio'  => 50,
'descripcion'  => '...',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //1
        DB::table('habitaciones')->insert([
            'nombre'    => '302',
            'nivel_id'  => 3,
            'categoria_id'  => 2,
            'tarifa_id'  => 5,
            'precio'  => 50,
'descripcion'  => '...',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //1
        DB::table('habitaciones')->insert([
            'nombre'    => '303',
            'nivel_id'  => 3,
            'categoria_id'  => 3,
            'tarifa_id'  => 5,
            'precio'  => 50,
            'descripcion'  => '...',

            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
    }
}
