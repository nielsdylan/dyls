<?php

namespace Database\Seeders\Job;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JerarquiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1
        DB::table('jerarquias')->insert([
            'nombre'        => 'SODAS',
            'estado_id'        => 1,
            'created_at'    => date('Y-m-d H:i:s'),
        ]);
        //2
        DB::table('jerarquias')->insert([
            'nombre'        => 'SNACKS',
            'estado_id'        => 1,
            'created_at'    => date('Y-m-d H:i:s'),
        ]);
        //3
        DB::table('jerarquias')->insert([
            'nombre'        => 'BEBIDAS',
            'estado_id'        => 1,
            'created_at'    => date('Y-m-d H:i:s'),
        ]);
        //4
        DB::table('jerarquias')->insert([
            'nombre'        => 'TABACO',
            'estado_id'        => 1,
            'created_at'    => date('Y-m-d H:i:s'),
        ]);
    }
}
