<?php

namespace Database\Seeders\Job;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecepcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //1
        DB::table('recepciones')->insert([
            'habitacion_id' => 1,
            'estado_id'     => 3,
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //2
        DB::table('recepciones')->insert([
            'habitacion_id' => 2,
            'estado_id'     => 3,
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //3
        DB::table('recepciones')->insert([
            'habitacion_id' => 3,
            'estado_id'     => 3,
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //4
        DB::table('recepciones')->insert([
            'habitacion_id' => 4,
            'estado_id'     => 3,
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //5
        DB::table('recepciones')->insert([
            'habitacion_id' => 5,
            'estado_id'     => 3,
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //6
        DB::table('recepciones')->insert([
            'habitacion_id' => 6,
            'estado_id'     => 3,
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
    }
}
